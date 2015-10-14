<?php

namespace GEA\SoporteBundle\Form\Type\Usuario;

use GEA\SoporteBundle\Model\PerfilQuery;
use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UsuarioPerfilType extends BaseAbstractType {

    private $perfil;
    protected $options = array(
        'name' => 'ediatPerfilesUsuario',
    );

    public function __construct($profile) {
        $this->perfil = $profile;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $perfilestmp = PerfilQuery::create();
        if ($this->perfil) {
            $perfiles = $perfilestmp->find();
        } else {
            $perfilestmp->where('id != 1');
            $perfiles = $perfilestmp->find();
        }
        $builder->add('Perfiles', 'model', array(
            'class' => 'GEA\SoporteBundle\Model\Perfil',
            'property' => 'nombre',
            'attr' => array('class' => 'select2 select2-offscreen visible', 'multiple' => ''),
            'multiple' => 'true',
        ));
    }

}
