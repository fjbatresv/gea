<?php

namespace GEA\SoporteBundle\Controller;

use GEA\SoporteBundle\Model\MenuQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
   public function portadaAction() {
       
        return $this->render('GEASoporteBundle:Default:portada.html.twig', array('portada' => null));
    }

    public function menuSidebarAction() {
        $menus = MenuQuery::create()
                ->filterByMostrar(1)
                ->usePerfilMenuQuery()
                ->usePerfilQuery()
                ->useUsuarioPerfilQuery()
                ->filterByUsuarioId($this->getUser()->getId())
                ->endUse()
                ->endUse()
                ->endUse()
                ->groupBy('menu.id')
                ->find();
        return $this->render('::sidebar.html.twig', array('menus' => $menus));
    }

    public function menuHeaderAction() {

        return $this->render('::header.html.twig');
    }
}
