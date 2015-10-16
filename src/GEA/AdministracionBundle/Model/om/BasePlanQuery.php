<?php

namespace GEA\AdministracionBundle\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use GEA\AdministracionBundle\Model\Moneda;
use GEA\AdministracionBundle\Model\Plan;
use GEA\AdministracionBundle\Model\PlanPeer;
use GEA\AdministracionBundle\Model\PlanQuery;

/**
 * @method PlanQuery orderById($order = Criteria::ASC) Order by the id column
 * @method PlanQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method PlanQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method PlanQuery orderByPrecio($order = Criteria::ASC) Order by the precio column
 * @method PlanQuery orderByUsuarios($order = Criteria::ASC) Order by the usuarios column
 * @method PlanQuery orderByMonedaId($order = Criteria::ASC) Order by the moneda_id column
 * @method PlanQuery orderByLogoPropio($order = Criteria::ASC) Order by the logo_propio column
 * @method PlanQuery orderByQuitarLogo($order = Criteria::ASC) Order by the quitar_logo column
 * @method PlanQuery orderByCorreoMasivo($order = Criteria::ASC) Order by the correo_masivo column
 * @method PlanQuery orderByCorreoInfo($order = Criteria::ASC) Order by the correo_info column
 * @method PlanQuery orderByCrearExamenes($order = Criteria::ASC) Order by the crear_examenes column
 * @method PlanQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method PlanQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 * @method PlanQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method PlanQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method PlanQuery groupById() Group by the id column
 * @method PlanQuery groupByNombre() Group by the nombre column
 * @method PlanQuery groupByDescripcion() Group by the descripcion column
 * @method PlanQuery groupByPrecio() Group by the precio column
 * @method PlanQuery groupByUsuarios() Group by the usuarios column
 * @method PlanQuery groupByMonedaId() Group by the moneda_id column
 * @method PlanQuery groupByLogoPropio() Group by the logo_propio column
 * @method PlanQuery groupByQuitarLogo() Group by the quitar_logo column
 * @method PlanQuery groupByCorreoMasivo() Group by the correo_masivo column
 * @method PlanQuery groupByCorreoInfo() Group by the correo_info column
 * @method PlanQuery groupByCrearExamenes() Group by the crear_examenes column
 * @method PlanQuery groupByCreatedBy() Group by the created_by column
 * @method PlanQuery groupByUpdatedBy() Group by the updated_by column
 * @method PlanQuery groupByCreatedAt() Group by the created_at column
 * @method PlanQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method PlanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PlanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PlanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PlanQuery leftJoinMoneda($relationAlias = null) Adds a LEFT JOIN clause to the query using the Moneda relation
 * @method PlanQuery rightJoinMoneda($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Moneda relation
 * @method PlanQuery innerJoinMoneda($relationAlias = null) Adds a INNER JOIN clause to the query using the Moneda relation
 *
 * @method Plan findOne(PropelPDO $con = null) Return the first Plan matching the query
 * @method Plan findOneOrCreate(PropelPDO $con = null) Return the first Plan matching the query, or a new Plan object populated from the query conditions when no match is found
 *
 * @method Plan findOneByNombre(string $nombre) Return the first Plan filtered by the nombre column
 * @method Plan findOneByDescripcion(string $descripcion) Return the first Plan filtered by the descripcion column
 * @method Plan findOneByPrecio(double $precio) Return the first Plan filtered by the precio column
 * @method Plan findOneByUsuarios(int $usuarios) Return the first Plan filtered by the usuarios column
 * @method Plan findOneByMonedaId(int $moneda_id) Return the first Plan filtered by the moneda_id column
 * @method Plan findOneByLogoPropio(boolean $logo_propio) Return the first Plan filtered by the logo_propio column
 * @method Plan findOneByQuitarLogo(boolean $quitar_logo) Return the first Plan filtered by the quitar_logo column
 * @method Plan findOneByCorreoMasivo(boolean $correo_masivo) Return the first Plan filtered by the correo_masivo column
 * @method Plan findOneByCorreoInfo(boolean $correo_info) Return the first Plan filtered by the correo_info column
 * @method Plan findOneByCrearExamenes(boolean $crear_examenes) Return the first Plan filtered by the crear_examenes column
 * @method Plan findOneByCreatedBy(string $created_by) Return the first Plan filtered by the created_by column
 * @method Plan findOneByUpdatedBy(string $updated_by) Return the first Plan filtered by the updated_by column
 * @method Plan findOneByCreatedAt(string $created_at) Return the first Plan filtered by the created_at column
 * @method Plan findOneByUpdatedAt(string $updated_at) Return the first Plan filtered by the updated_at column
 *
 * @method array findById(int $id) Return Plan objects filtered by the id column
 * @method array findByNombre(string $nombre) Return Plan objects filtered by the nombre column
 * @method array findByDescripcion(string $descripcion) Return Plan objects filtered by the descripcion column
 * @method array findByPrecio(double $precio) Return Plan objects filtered by the precio column
 * @method array findByUsuarios(int $usuarios) Return Plan objects filtered by the usuarios column
 * @method array findByMonedaId(int $moneda_id) Return Plan objects filtered by the moneda_id column
 * @method array findByLogoPropio(boolean $logo_propio) Return Plan objects filtered by the logo_propio column
 * @method array findByQuitarLogo(boolean $quitar_logo) Return Plan objects filtered by the quitar_logo column
 * @method array findByCorreoMasivo(boolean $correo_masivo) Return Plan objects filtered by the correo_masivo column
 * @method array findByCorreoInfo(boolean $correo_info) Return Plan objects filtered by the correo_info column
 * @method array findByCrearExamenes(boolean $crear_examenes) Return Plan objects filtered by the crear_examenes column
 * @method array findByCreatedBy(string $created_by) Return Plan objects filtered by the created_by column
 * @method array findByUpdatedBy(string $updated_by) Return Plan objects filtered by the updated_by column
 * @method array findByCreatedAt(string $created_at) Return Plan objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Plan objects filtered by the updated_at column
 */
abstract class BasePlanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePlanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'default';
        }
        if (null === $modelName) {
            $modelName = 'GEA\\AdministracionBundle\\Model\\Plan';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PlanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PlanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PlanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PlanQuery) {
            return $criteria;
        }
        $query = new PlanQuery(null, null, $modelAlias);

        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Plan|Plan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PlanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PlanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Plan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Plan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `nombre`, `descripcion`, `precio`, `usuarios`, `moneda_id`, `logo_propio`, `quitar_logo`, `correo_masivo`, `correo_info`, `crear_examenes`, `created_by`, `updated_by`, `created_at`, `updated_at` FROM `plan` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Plan();
            $obj->hydrate($row);
            PlanPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Plan|Plan[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Plan[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PlanPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PlanPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PlanPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PlanPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlanPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombre)) {
                $nombre = str_replace('*', '%', $nombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlanPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcion)) {
                $descripcion = str_replace('*', '%', $descripcion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlanPeer::DESCRIPCION, $descripcion, $comparison);
    }

    /**
     * Filter the query on the precio column
     *
     * Example usage:
     * <code>
     * $query->filterByPrecio(1234); // WHERE precio = 1234
     * $query->filterByPrecio(array(12, 34)); // WHERE precio IN (12, 34)
     * $query->filterByPrecio(array('min' => 12)); // WHERE precio >= 12
     * $query->filterByPrecio(array('max' => 12)); // WHERE precio <= 12
     * </code>
     *
     * @param     mixed $precio The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByPrecio($precio = null, $comparison = null)
    {
        if (is_array($precio)) {
            $useMinMax = false;
            if (isset($precio['min'])) {
                $this->addUsingAlias(PlanPeer::PRECIO, $precio['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($precio['max'])) {
                $this->addUsingAlias(PlanPeer::PRECIO, $precio['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlanPeer::PRECIO, $precio, $comparison);
    }

    /**
     * Filter the query on the usuarios column
     *
     * Example usage:
     * <code>
     * $query->filterByUsuarios(1234); // WHERE usuarios = 1234
     * $query->filterByUsuarios(array(12, 34)); // WHERE usuarios IN (12, 34)
     * $query->filterByUsuarios(array('min' => 12)); // WHERE usuarios >= 12
     * $query->filterByUsuarios(array('max' => 12)); // WHERE usuarios <= 12
     * </code>
     *
     * @param     mixed $usuarios The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByUsuarios($usuarios = null, $comparison = null)
    {
        if (is_array($usuarios)) {
            $useMinMax = false;
            if (isset($usuarios['min'])) {
                $this->addUsingAlias(PlanPeer::USUARIOS, $usuarios['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usuarios['max'])) {
                $this->addUsingAlias(PlanPeer::USUARIOS, $usuarios['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlanPeer::USUARIOS, $usuarios, $comparison);
    }

    /**
     * Filter the query on the moneda_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMonedaId(1234); // WHERE moneda_id = 1234
     * $query->filterByMonedaId(array(12, 34)); // WHERE moneda_id IN (12, 34)
     * $query->filterByMonedaId(array('min' => 12)); // WHERE moneda_id >= 12
     * $query->filterByMonedaId(array('max' => 12)); // WHERE moneda_id <= 12
     * </code>
     *
     * @see       filterByMoneda()
     *
     * @param     mixed $monedaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByMonedaId($monedaId = null, $comparison = null)
    {
        if (is_array($monedaId)) {
            $useMinMax = false;
            if (isset($monedaId['min'])) {
                $this->addUsingAlias(PlanPeer::MONEDA_ID, $monedaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($monedaId['max'])) {
                $this->addUsingAlias(PlanPeer::MONEDA_ID, $monedaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlanPeer::MONEDA_ID, $monedaId, $comparison);
    }

    /**
     * Filter the query on the logo_propio column
     *
     * Example usage:
     * <code>
     * $query->filterByLogoPropio(true); // WHERE logo_propio = true
     * $query->filterByLogoPropio('yes'); // WHERE logo_propio = true
     * </code>
     *
     * @param     boolean|string $logoPropio The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByLogoPropio($logoPropio = null, $comparison = null)
    {
        if (is_string($logoPropio)) {
            $logoPropio = in_array(strtolower($logoPropio), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PlanPeer::LOGO_PROPIO, $logoPropio, $comparison);
    }

    /**
     * Filter the query on the quitar_logo column
     *
     * Example usage:
     * <code>
     * $query->filterByQuitarLogo(true); // WHERE quitar_logo = true
     * $query->filterByQuitarLogo('yes'); // WHERE quitar_logo = true
     * </code>
     *
     * @param     boolean|string $quitarLogo The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByQuitarLogo($quitarLogo = null, $comparison = null)
    {
        if (is_string($quitarLogo)) {
            $quitarLogo = in_array(strtolower($quitarLogo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PlanPeer::QUITAR_LOGO, $quitarLogo, $comparison);
    }

    /**
     * Filter the query on the correo_masivo column
     *
     * Example usage:
     * <code>
     * $query->filterByCorreoMasivo(true); // WHERE correo_masivo = true
     * $query->filterByCorreoMasivo('yes'); // WHERE correo_masivo = true
     * </code>
     *
     * @param     boolean|string $correoMasivo The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByCorreoMasivo($correoMasivo = null, $comparison = null)
    {
        if (is_string($correoMasivo)) {
            $correoMasivo = in_array(strtolower($correoMasivo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PlanPeer::CORREO_MASIVO, $correoMasivo, $comparison);
    }

    /**
     * Filter the query on the correo_info column
     *
     * Example usage:
     * <code>
     * $query->filterByCorreoInfo(true); // WHERE correo_info = true
     * $query->filterByCorreoInfo('yes'); // WHERE correo_info = true
     * </code>
     *
     * @param     boolean|string $correoInfo The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByCorreoInfo($correoInfo = null, $comparison = null)
    {
        if (is_string($correoInfo)) {
            $correoInfo = in_array(strtolower($correoInfo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PlanPeer::CORREO_INFO, $correoInfo, $comparison);
    }

    /**
     * Filter the query on the crear_examenes column
     *
     * Example usage:
     * <code>
     * $query->filterByCrearExamenes(true); // WHERE crear_examenes = true
     * $query->filterByCrearExamenes('yes'); // WHERE crear_examenes = true
     * </code>
     *
     * @param     boolean|string $crearExamenes The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByCrearExamenes($crearExamenes = null, $comparison = null)
    {
        if (is_string($crearExamenes)) {
            $crearExamenes = in_array(strtolower($crearExamenes), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PlanPeer::CREAR_EXAMENES, $crearExamenes, $comparison);
    }

    /**
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy('fooValue');   // WHERE created_by = 'fooValue'
     * $query->filterByCreatedBy('%fooValue%'); // WHERE created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $createdBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($createdBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $createdBy)) {
                $createdBy = str_replace('*', '%', $createdBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlanPeer::CREATED_BY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy('fooValue');   // WHERE updated_by = 'fooValue'
     * $query->filterByUpdatedBy('%fooValue%'); // WHERE updated_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByUpdatedBy($updatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updatedBy)) {
                $updatedBy = str_replace('*', '%', $updatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PlanPeer::UPDATED_BY, $updatedBy, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PlanPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PlanPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlanPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(PlanPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(PlanPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PlanPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Moneda object
     *
     * @param   Moneda|PropelObjectCollection $moneda The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PlanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMoneda($moneda, $comparison = null)
    {
        if ($moneda instanceof Moneda) {
            return $this
                ->addUsingAlias(PlanPeer::MONEDA_ID, $moneda->getId(), $comparison);
        } elseif ($moneda instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlanPeer::MONEDA_ID, $moneda->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMoneda() only accepts arguments of type Moneda or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Moneda relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function joinMoneda($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Moneda');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Moneda');
        }

        return $this;
    }

    /**
     * Use the Moneda relation Moneda object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \GEA\AdministracionBundle\Model\MonedaQuery A secondary query class using the current class as primary query
     */
    public function useMonedaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMoneda($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Moneda', '\GEA\AdministracionBundle\Model\MonedaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Plan $plan Object to remove from the list of results
     *
     * @return PlanQuery The current query, for fluid interface
     */
    public function prune($plan = null)
    {
        if ($plan) {
            $this->addUsingAlias(PlanPeer::ID, $plan->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     PlanQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(PlanPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     PlanQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(PlanPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     PlanQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(PlanPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     PlanQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(PlanPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     PlanQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(PlanPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     PlanQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(PlanPeer::CREATED_AT);
    }
}
