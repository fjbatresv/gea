<?php

namespace GEA\SoporteBundle\Controller;

use GEA\SoporteBundle\Form\Type\Perfil\PerfilMenuType;
use GEA\SoporteBundle\Model\MenuQuery;
use GEA\SoporteBundle\Model\PerfilMenu;
use GEA\SoporteBundle\Model\PerfilMenuQuery;
use GEA\SoporteBundle\Model\PerfilQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of PerfilController
 *
 * @author javier
 */
class PerfilController extends Controller {

    public function menuAction(Request $request) {
        $form = $this->createForm(new PerfilMenuType());
        $form->handleRequest($request);
        $menus = MenuQuery::create()->where('mostrar = 1')->find();
        if ($form->isValid()) {
            $valores = $form->getData();
            $perfil = PerfilQuery::create()
                    ->findOneById($request->get('pk'));
            PerfilMenuQuery::create()
                    ->filterByPerfilId($perfil->getId())
                    ->find()
                    ->delete();
            $menusDB = MenuQuery::create()
                    ->where('superior <> 0')
                    ->where('mostrar = 0')
                    ->find();
            foreach ($valores['Menu'] as $menu) {
                $nuevoMenuPerfil = new PerfilMenu();
                $nuevoMenuPerfil->setPerfilId($perfil->getId());
                $nuevoMenuPerfil->setMenuId($menu->getId());
                $nuevoMenuPerfil->save();
                foreach ($menusDB as $menuDB) {
                    if ($menuDB->getSuperior() == $menu->getId()) {
                        $nuevoMenuPerfil = new PerfilMenu();
                        $nuevoMenuPerfil->setPerfilId($perfil->getId());
                        $nuevoMenuPerfil->setMenuId($menuDB->getId());
                        $nuevoMenuPerfil->save();
                    }
                }
            }
            return new RedirectResponse($this->generateUrl('GEA_SoporteBundle_Perfil_list'));
        }
        if (!$form->getData()) {
            $menuVista = MenuQuery::create()
                    ->usePerfilMenuQuery()
                    ->filterByPerfilId($request->get('pk'))
                    ->endUse()
                    ->find();
            $form['Menu']->setData($menuVista);
        }
        return $this->render('GEASoporteBundle:Perfil:menuPerfil.html.twig', array(
                    'form' => $form->createView(),
                    'menus' => $menus,
                    'pk' => $request->get('pk')
        ));
    }

}
