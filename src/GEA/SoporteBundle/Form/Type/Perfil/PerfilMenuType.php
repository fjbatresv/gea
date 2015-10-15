<?php

namespace GEA\SoporteBundle\Form\Type\Perfil;

use GEA\SoporteBundle\Model\MenuQuery;
use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PerfilMenuType extends BaseAbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('Menu', 'model', array(
            'class' => 'GEA\SoporteBundle\Model\Menu',
            'property' => 'Nombre',
            'multiple' => true,
            'expanded' => true,
            'query' => MenuQuery::create()->where('mostrar = 1'),
            'required' => false,
        ));
    }

}
