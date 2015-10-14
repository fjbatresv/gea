<?php

namespace GEA\SoporteBundle\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use GEA\SoporteBundle\Model\EstadoUsuarioPeer;
use GEA\SoporteBundle\Model\Usuario;
use GEA\SoporteBundle\Model\UsuarioPeer;
use GEA\SoporteBundle\Model\UsuarioPerfilPeer;
use GEA\SoporteBundle\Model\map\UsuarioTableMap;

abstract class BaseUsuarioPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'default';

    /** the table name for this class */
    const TABLE_NAME = 'usuario';

    /** the related Propel class for this table */
    const OM_CLASS = 'GEA\\SoporteBundle\\Model\\Usuario';

    /** the related TableMap class for this table */
    const TM_CLASS = 'GEA\\SoporteBundle\\Model\\map\\UsuarioTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 16;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 16;

    /** the column name for the id field */
    const ID = 'usuario.id';

    /** the column name for the nombre field */
    const NOMBRE = 'usuario.nombre';

    /** the column name for the email field */
    const EMAIL = 'usuario.email';

    /** the column name for the salt field */
    const SALT = 'usuario.salt';

    /** the column name for the apellido field */
    const APELLIDO = 'usuario.apellido';

    /** the column name for the username field */
    const USERNAME = 'usuario.username';

    /** the column name for the password field */
    const PASSWORD = 'usuario.password';

    /** the column name for the direccion field */
    const DIRECCION = 'usuario.direccion';

    /** the column name for the fecha_nacimiento field */
    const FECHA_NACIMIENTO = 'usuario.fecha_nacimiento';

    /** the column name for the ultimo_cambio_password field */
    const ULTIMO_CAMBIO_PASSWORD = 'usuario.ultimo_cambio_password';

    /** the column name for the estado_usuario_id field */
    const ESTADO_USUARIO_ID = 'usuario.estado_usuario_id';

    /** the column name for the record_password field */
    const RECORD_PASSWORD = 'usuario.record_password';

    /** the column name for the created_by field */
    const CREATED_BY = 'usuario.created_by';

    /** the column name for the updated_by field */
    const UPDATED_BY = 'usuario.updated_by';

    /** the column name for the created_at field */
    const CREATED_AT = 'usuario.created_at';

    /** the column name for the updated_at field */
    const UPDATED_AT = 'usuario.updated_at';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identity map to hold any loaded instances of Usuario objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Usuario[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. UsuarioPeer::$fieldNames[UsuarioPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'Nombre', 'Email', 'Salt', 'Apellido', 'Username', 'Password', 'Direccion', 'FechaNacimiento', 'UltimoCambioPassword', 'EstadoUsuarioId', 'RecordPassword', 'CreatedBy', 'UpdatedBy', 'CreatedAt', 'UpdatedAt', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'nombre', 'email', 'salt', 'apellido', 'username', 'password', 'direccion', 'fechaNacimiento', 'ultimoCambioPassword', 'estadoUsuarioId', 'recordPassword', 'createdBy', 'updatedBy', 'createdAt', 'updatedAt', ),
        BasePeer::TYPE_COLNAME => array (UsuarioPeer::ID, UsuarioPeer::NOMBRE, UsuarioPeer::EMAIL, UsuarioPeer::SALT, UsuarioPeer::APELLIDO, UsuarioPeer::USERNAME, UsuarioPeer::PASSWORD, UsuarioPeer::DIRECCION, UsuarioPeer::FECHA_NACIMIENTO, UsuarioPeer::ULTIMO_CAMBIO_PASSWORD, UsuarioPeer::ESTADO_USUARIO_ID, UsuarioPeer::RECORD_PASSWORD, UsuarioPeer::CREATED_BY, UsuarioPeer::UPDATED_BY, UsuarioPeer::CREATED_AT, UsuarioPeer::UPDATED_AT, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'NOMBRE', 'EMAIL', 'SALT', 'APELLIDO', 'USERNAME', 'PASSWORD', 'DIRECCION', 'FECHA_NACIMIENTO', 'ULTIMO_CAMBIO_PASSWORD', 'ESTADO_USUARIO_ID', 'RECORD_PASSWORD', 'CREATED_BY', 'UPDATED_BY', 'CREATED_AT', 'UPDATED_AT', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'nombre', 'email', 'salt', 'apellido', 'username', 'password', 'direccion', 'fecha_nacimiento', 'ultimo_cambio_password', 'estado_usuario_id', 'record_password', 'created_by', 'updated_by', 'created_at', 'updated_at', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. UsuarioPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Nombre' => 1, 'Email' => 2, 'Salt' => 3, 'Apellido' => 4, 'Username' => 5, 'Password' => 6, 'Direccion' => 7, 'FechaNacimiento' => 8, 'UltimoCambioPassword' => 9, 'EstadoUsuarioId' => 10, 'RecordPassword' => 11, 'CreatedBy' => 12, 'UpdatedBy' => 13, 'CreatedAt' => 14, 'UpdatedAt' => 15, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'nombre' => 1, 'email' => 2, 'salt' => 3, 'apellido' => 4, 'username' => 5, 'password' => 6, 'direccion' => 7, 'fechaNacimiento' => 8, 'ultimoCambioPassword' => 9, 'estadoUsuarioId' => 10, 'recordPassword' => 11, 'createdBy' => 12, 'updatedBy' => 13, 'createdAt' => 14, 'updatedAt' => 15, ),
        BasePeer::TYPE_COLNAME => array (UsuarioPeer::ID => 0, UsuarioPeer::NOMBRE => 1, UsuarioPeer::EMAIL => 2, UsuarioPeer::SALT => 3, UsuarioPeer::APELLIDO => 4, UsuarioPeer::USERNAME => 5, UsuarioPeer::PASSWORD => 6, UsuarioPeer::DIRECCION => 7, UsuarioPeer::FECHA_NACIMIENTO => 8, UsuarioPeer::ULTIMO_CAMBIO_PASSWORD => 9, UsuarioPeer::ESTADO_USUARIO_ID => 10, UsuarioPeer::RECORD_PASSWORD => 11, UsuarioPeer::CREATED_BY => 12, UsuarioPeer::UPDATED_BY => 13, UsuarioPeer::CREATED_AT => 14, UsuarioPeer::UPDATED_AT => 15, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'NOMBRE' => 1, 'EMAIL' => 2, 'SALT' => 3, 'APELLIDO' => 4, 'USERNAME' => 5, 'PASSWORD' => 6, 'DIRECCION' => 7, 'FECHA_NACIMIENTO' => 8, 'ULTIMO_CAMBIO_PASSWORD' => 9, 'ESTADO_USUARIO_ID' => 10, 'RECORD_PASSWORD' => 11, 'CREATED_BY' => 12, 'UPDATED_BY' => 13, 'CREATED_AT' => 14, 'UPDATED_AT' => 15, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'nombre' => 1, 'email' => 2, 'salt' => 3, 'apellido' => 4, 'username' => 5, 'password' => 6, 'direccion' => 7, 'fecha_nacimiento' => 8, 'ultimo_cambio_password' => 9, 'estado_usuario_id' => 10, 'record_password' => 11, 'created_by' => 12, 'updated_by' => 13, 'created_at' => 14, 'updated_at' => 15, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = UsuarioPeer::getFieldNames($toType);
        $key = isset(UsuarioPeer::$fieldKeys[$fromType][$name]) ? UsuarioPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(UsuarioPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, UsuarioPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return UsuarioPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. UsuarioPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(UsuarioPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(UsuarioPeer::ID);
            $criteria->addSelectColumn(UsuarioPeer::NOMBRE);
            $criteria->addSelectColumn(UsuarioPeer::EMAIL);
            $criteria->addSelectColumn(UsuarioPeer::SALT);
            $criteria->addSelectColumn(UsuarioPeer::APELLIDO);
            $criteria->addSelectColumn(UsuarioPeer::USERNAME);
            $criteria->addSelectColumn(UsuarioPeer::PASSWORD);
            $criteria->addSelectColumn(UsuarioPeer::DIRECCION);
            $criteria->addSelectColumn(UsuarioPeer::FECHA_NACIMIENTO);
            $criteria->addSelectColumn(UsuarioPeer::ULTIMO_CAMBIO_PASSWORD);
            $criteria->addSelectColumn(UsuarioPeer::ESTADO_USUARIO_ID);
            $criteria->addSelectColumn(UsuarioPeer::RECORD_PASSWORD);
            $criteria->addSelectColumn(UsuarioPeer::CREATED_BY);
            $criteria->addSelectColumn(UsuarioPeer::UPDATED_BY);
            $criteria->addSelectColumn(UsuarioPeer::CREATED_AT);
            $criteria->addSelectColumn(UsuarioPeer::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.salt');
            $criteria->addSelectColumn($alias . '.apellido');
            $criteria->addSelectColumn($alias . '.username');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.direccion');
            $criteria->addSelectColumn($alias . '.fecha_nacimiento');
            $criteria->addSelectColumn($alias . '.ultimo_cambio_password');
            $criteria->addSelectColumn($alias . '.estado_usuario_id');
            $criteria->addSelectColumn($alias . '.record_password');
            $criteria->addSelectColumn($alias . '.created_by');
            $criteria->addSelectColumn($alias . '.updated_by');
            $criteria->addSelectColumn($alias . '.created_at');
            $criteria->addSelectColumn($alias . '.updated_at');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsuarioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(UsuarioPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return Usuario
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = UsuarioPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return UsuarioPeer::populateObjects(UsuarioPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            UsuarioPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(UsuarioPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param Usuario $obj A Usuario object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            UsuarioPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Usuario object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Usuario) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Usuario object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(UsuarioPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return Usuario Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(UsuarioPeer::$instances[$key])) {
                return UsuarioPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references) {
        foreach (UsuarioPeer::$instances as $instance) {
          $instance->clearAllReferences(true);
        }
      }
        UsuarioPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to usuario
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in UsuarioPerfilPeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        UsuarioPerfilPeer::clearInstancePool();
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = UsuarioPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = UsuarioPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsuarioPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Usuario object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = UsuarioPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + UsuarioPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsuarioPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            UsuarioPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related EstadoUsuario table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinEstadoUsuario(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsuarioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UsuarioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsuarioPeer::ESTADO_USUARIO_ID, EstadoUsuarioPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Usuario objects pre-filled with their EstadoUsuario objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Usuario objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinEstadoUsuario(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsuarioPeer::DATABASE_NAME);
        }

        UsuarioPeer::addSelectColumns($criteria);
        $startcol = UsuarioPeer::NUM_HYDRATE_COLUMNS;
        EstadoUsuarioPeer::addSelectColumns($criteria);

        $criteria->addJoin(UsuarioPeer::ESTADO_USUARIO_ID, EstadoUsuarioPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UsuarioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsuarioPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = EstadoUsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = EstadoUsuarioPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = EstadoUsuarioPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    EstadoUsuarioPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Usuario) to $obj2 (EstadoUsuario)
                $obj2->addUsuario($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UsuarioPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UsuarioPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UsuarioPeer::ESTADO_USUARIO_ID, EstadoUsuarioPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Usuario objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Usuario objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UsuarioPeer::DATABASE_NAME);
        }

        UsuarioPeer::addSelectColumns($criteria);
        $startcol2 = UsuarioPeer::NUM_HYDRATE_COLUMNS;

        EstadoUsuarioPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + EstadoUsuarioPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UsuarioPeer::ESTADO_USUARIO_ID, EstadoUsuarioPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UsuarioPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UsuarioPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined EstadoUsuario rows

            $key2 = EstadoUsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = EstadoUsuarioPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = EstadoUsuarioPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    EstadoUsuarioPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Usuario) to the collection in $obj2 (EstadoUsuario)
                $obj2->addUsuario($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(UsuarioPeer::DATABASE_NAME)->getTable(UsuarioPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseUsuarioPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseUsuarioPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new \GEA\SoporteBundle\Model\map\UsuarioTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass($row = 0, $colnum = 0)
    {
        return UsuarioPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Usuario or Criteria object.
     *
     * @param      mixed $values Criteria or Usuario object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Usuario object
        }

        if ($criteria->containsKey(UsuarioPeer::ID) && $criteria->keyContainsValue(UsuarioPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsuarioPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(UsuarioPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Usuario or Criteria object.
     *
     * @param      mixed $values Criteria or Usuario object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(UsuarioPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(UsuarioPeer::ID);
            $value = $criteria->remove(UsuarioPeer::ID);
            if ($value) {
                $selectCriteria->add(UsuarioPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);
            }

        } else { // $values is Usuario object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(UsuarioPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the usuario table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += UsuarioPeer::doOnDeleteCascade(new Criteria(UsuarioPeer::DATABASE_NAME), $con);
            $affectedRows += BasePeer::doDeleteAll(UsuarioPeer::TABLE_NAME, $con, UsuarioPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsuarioPeer::clearInstancePool();
            UsuarioPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Usuario or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Usuario object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Usuario) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
            $criteria->add(UsuarioPeer::ID, (array) $values, Criteria::IN);
        }

        // Set the correct dbName
        $criteria->setDbName(UsuarioPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            // cloning the Criteria in case it's modified by doSelect() or doSelectStmt()
            $c = clone $criteria;
            $affectedRows += UsuarioPeer::doOnDeleteCascade($c, $con);

            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            if ($values instanceof Criteria) {
                UsuarioPeer::clearInstancePool();
            } elseif ($values instanceof Usuario) { // it's a model object
                UsuarioPeer::removeInstanceFromPool($values);
            } else { // it's a primary key, or an array of pks
                foreach ((array) $values as $singleval) {
                    UsuarioPeer::removeInstanceFromPool($singleval);
                }
            }

            $affectedRows += BasePeer::doDelete($criteria, $con);
            UsuarioPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * This is a method for emulating ON DELETE CASCADE for DBs that don't support this
     * feature (like MySQL or SQLite).
     *
     * This method is not very speedy because it must perform a query first to get
     * the implicated records and then perform the deletes by calling those Peer classes.
     *
     * This method should be used within a transaction if possible.
     *
     * @param      Criteria $criteria
     * @param      PropelPDO $con
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
    {
        // initialize var to track total num of affected rows
        $affectedRows = 0;

        // first find the objects that are implicated by the $criteria
        $objects = UsuarioPeer::doSelect($criteria, $con);
        foreach ($objects as $obj) {


            // delete related UsuarioPerfil objects
            $criteria = new Criteria(UsuarioPerfilPeer::DATABASE_NAME);

            $criteria->add(UsuarioPerfilPeer::USUARIO_ID, $obj->getId());
            $affectedRows += UsuarioPerfilPeer::doDelete($criteria, $con);
        }

        return $affectedRows;
    }

    /**
     * Validates all modified columns of given Usuario object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param Usuario $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(UsuarioPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(UsuarioPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(UsuarioPeer::DATABASE_NAME, UsuarioPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Usuario
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = UsuarioPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
        $criteria->add(UsuarioPeer::ID, $pk);

        $v = UsuarioPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Usuario[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
            $criteria->add(UsuarioPeer::ID, $pks, Criteria::IN);
            $objs = UsuarioPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseUsuarioPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseUsuarioPeer::buildTableMap();

