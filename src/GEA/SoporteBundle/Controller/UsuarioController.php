<?php

namespace GEA\SoporteBundle\Controller;

use GEA\SoporteBundle\Form\Type\Usuario\UsuarioPerfilType;
use GEA\SoporteBundle\Model\PerfilQuery;
use GEA\SoporteBundle\Model\UsuarioPerfil;
use GEA\SoporteBundle\Model\UsuarioPerfilQuery;
use GEA\SoporteBundle\Model\UsuarioQuery;
use Propel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of UsuarioController
 *
 * @author javier
 */
class UsuarioController extends Controller {
    public function editarPerfilAction(Request $request) {
        $usuarioActual = $request->get('pk');
        $error = '';
        $perfiles = array();
        $perfil = UsuarioQuery::create()
                ->filterById($this->getUser()->getId())
                ->useUsuarioPerfilQuery()
                ->usePerfilQuery()
                ->filterById(1)
                ->endUse()
                ->endUse()
                ->findOne();
        $usuario = UsuarioQuery::create()
                ->filterById($request->get('pk'))
                ->findOne();
        $usuarioPerfilesTmp = UsuarioPerfilQuery::create()
                ->filterByUsuarioId($usuarioActual);
        if ($perfil) {
            $usuarioPerfiles = $usuarioPerfilesTmp->find();
        } else {
            $usuarioPerfilesTmp->where('perfil_id !=1');
            $usuarioPerfiles = $usuarioPerfilesTmp->find();
        }
        $perfilesdb = PerfilQuery::create();
        if ($perfil) {
            $perfildb = $perfilesdb->find();
        } else {
            $perfilesdb->where('id != 1');
            $perfildb = $perfilesdb->find();
        }
        $form = $this->createForm(new UsuarioPerfilType($perfil));
        $form->handleRequest($request);
        if ($form->isValid()) {
            $perfiles = $form['Perfiles']->getData();
            if (sizeof($perfiles) > 0) {
                $con = Propel::getConnection();
                $con->beginTransaction();
                UsuarioPerfilQuery::create()
                        ->filterByUsuarioId($request->get('pk'))
                        ->find()->delete();
                foreach ($perfiles as $perfil) {
                    $perfilNuevo = new UsuarioPerfil();
                    $perfilNuevo->setUsuarioId($request->get('pk'));
                    $perfilNuevo->setPerfilId($perfil->getId());
                    $perfilNuevo->save();
                }
                $con->commit();
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Los cambios en los perfilesdel usuario se han realizado exitosamente.',
                    'titulo' => 'Perfiles modificados',
                    'estado' => 'success'
                ));
                return new RedirectResponse($this->generateUrl('GEA_SoporteBundle_Usuario_list'));
            } else {
                $error = 'Debes seleccionar minimo una de las opciones.';
            }
        }
        if (!$form->getData()) {
            $perfiles = PerfilQuery::create()
                    ->useUsuarioPerfilQuery()
                    ->filterByUsuarioId($request->get('pk'))
                    ->endUse()
                    ->find();
            $form['Perfiles']->setData($perfiles);
        }
        return $this->render('GEASoporteBundle:Usuario:UsuarioPerfiles.html.twig', array(
                    'form' => $form->createView(),
                    'nombre' => $usuario->getUserName(),
                    'error' => $error, 'pk' => $request->get('pk')
        ));
    }
}
