<?php

namespace GEA\AdministracionBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'plan' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.GEA.AdministracionBundle.Model.map
 */
class PlanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.GEA.AdministracionBundle.Model.map.PlanTableMap';

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
        $this->setName('plan');
        $this->setPhpName('Plan');
        $this->setClassname('GEA\\AdministracionBundle\\Model\\Plan');
        $this->setPackage('src.GEA.AdministracionBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 50, null);
        $this->getColumn('nombre', false)->setPrimaryString(true);
        $this->addColumn('descripcion', 'Descripcion', 'LONGVARCHAR', false, null, null);
        $this->addColumn('precio', 'Precio', 'DOUBLE', true, null, null);
        $this->addColumn('usuarios', 'Usuarios', 'INTEGER', false, null, null);
        $this->addForeignKey('moneda_id', 'MonedaId', 'INTEGER', 'moneda', 'id', true, null, null);
        $this->addColumn('logo_propio', 'LogoPropio', 'BOOLEAN', true, 1, false);
        $this->addColumn('quitar_logo', 'QuitarLogo', 'BOOLEAN', true, 1, false);
        $this->addColumn('correo_masivo', 'CorreoMasivo', 'BOOLEAN', true, 1, false);
        $this->addColumn('correo_info', 'CorreoInfo', 'BOOLEAN', true, 1, false);
        $this->addColumn('crear_examenes', 'CrearExamenes', 'BOOLEAN', true, 1, false);
        $this->addColumn('created_by', 'CreatedBy', 'VARCHAR', false, 50, null);
        $this->addColumn('updated_by', 'UpdatedBy', 'VARCHAR', false, 50, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Moneda', 'GEA\\AdministracionBundle\\Model\\Moneda', RelationMap::MANY_TO_ONE, array('moneda_id' => 'id', ), null, null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // PlanTableMap
