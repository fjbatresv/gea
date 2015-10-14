<?php

namespace GEA\SoporteBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'estado_usuario' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.GEA.SoporteBundle.Model.map
 */
class EstadoUsuarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.GEA.SoporteBundle.Model.map.EstadoUsuarioTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('estado_usuario');
        $this->setPhpName('EstadoUsuario');
        $this->setClassname('GEA\\SoporteBundle\\Model\\EstadoUsuario');
        $this->setPackage('src.GEA.SoporteBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 20, null);
        $this->getColumn('nombre', false)->setPrimaryString(true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Usuario', 'GEA\\SoporteBundle\\Model\\Usuario', RelationMap::ONE_TO_MANY, array('id' => 'estado_usuario_id', ), null, null, 'Usuarios');
    } // buildRelations()

} // EstadoUsuarioTableMap
