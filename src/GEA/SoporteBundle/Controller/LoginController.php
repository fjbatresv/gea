<?php

namespace GEA\SoporteBundle\Controller;

use GEA\SoporteBundle\Form\Type\LoginType;
use GEA\SoporteBundle\Model\Bitacora;
use GEA\SoporteBundle\Model\UsuarioQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

/**
 * Description of LoginController
 *
 * @author javier
 */
class LoginController extends Controller {

    public function loginAction(Request $request, $error = null) {
        $securityContext = $this->get('security.context');
        $error = null;
        if (!$securityContext->isGranted('ROLE_USUARIO')) {
            $form = $this->createForm(new LoginType());
            $form->handleRequest($request);
            $sesion = $request->getSession();
            if ($form->isValid()) {
                $valores = $form->getData();
                $comprobacion = UsuarioQuery::create()
                        ->filterByUsername($valores['usuario'])
                        ->filterByPassword(hash('sha1', $valores['pass']))
                        ->findOne();
                if ($comprobacion) {
                    Bitacora::escribir(
                            $comprobacion
                            , $request->getClientIp()
                            , 'Login usuario"' . $comprobacion->getUserName() . '"'
                            , 1
                            , 'Login_Usuario'
                            , 0
                            , null
                            , null);
                    $this->get('session')->getFlashBag()->add('notificaciones', array(
                        'mostrar' => true,
                        'mensaje' => 'Bienvenido a CuponesSpike',
                        'titulo' => '',
                        'estado' => 'info'
                    ));
                    //login and token
                    $token = new UsernamePasswordToken($comprobacion, null, 'frontend', array('ROLE_USUARIO'));
                    $securityContext->setToken($token);
                    $sesion->set('frontend', serialize($token));
                    $event = new InteractiveLoginEvent($request, $token);
                    $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                    //redireccion
                    return new RedirectResponse($this->generateUrl('_pagina_inicio'));
                } else {
                    $usuariotmp = UsuarioQuery::create()
                            ->filterByUsername($valores['usuario'])
                            ->findOne();
                    $error = 'Clave incorrecta';
                    if ($usuariotmp) {
                        Bitacora::escribir($usuariotmp, $request->getClientIp(), 'Acceso al sistema', 0, null, null, $error, $usuariotmp);
                    } else {
                        $error = 'No existe este usuario';
                        Bitacora::escribir(null, $request->getClientIp(), 'Acceso al sistema', 0, null, null, $error, $usuariotmp);
                    }
                }
            }
            return $this->render(
                            'GEASoporteBundle:Default:login.html.twig', array(
                        'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
                        'error' => $error, 'form' => $form->createView())
            );
        }
        return new RedirectResponse($this->generateUrl('_pagina_inicio'));
    }

    public function preLogoutAction(Request $request) {
        Bitacora::escribir($this->getUser(), $request->getClientIp(), 'log out', 1, null, null, null, NULL);
        return new RedirectResponse($this->generateUrl('usuario_logout'));
    }

}
