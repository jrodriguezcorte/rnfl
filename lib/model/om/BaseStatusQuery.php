<?php


/**
 * Base class that represents a query for the 'status' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Thu Dec 25 22:47:30 2014
 *
 * @method     StatusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     StatusQuery orderByIdFeria($order = Criteria::ASC) Order by the id_feria column
 * @method     StatusQuery orderByIdExpositor($order = Criteria::ASC) Order by the id_expositor column
 * @method     StatusQuery orderByIdStatus($order = Criteria::ASC) Order by the id_status column
 * @method     StatusQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method     StatusQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     StatusQuery orderByIdExpositorFeria($order = Criteria::ASC) Order by the id_expositor_feria column
 * @method     StatusQuery orderByStatusActual($order = Criteria::ASC) Order by the status_actual column
 * @method     StatusQuery orderByIdPagoExpositor($order = Criteria::ASC) Order by the id_pago_expositor column
 *
 * @method     StatusQuery groupById() Group by the id column
 * @method     StatusQuery groupByIdFeria() Group by the id_feria column
 * @method     StatusQuery groupByIdExpositor() Group by the id_expositor column
 * @method     StatusQuery groupByIdStatus() Group by the id_status column
 * @method     StatusQuery groupByObservaciones() Group by the observaciones column
 * @method     StatusQuery groupByFecha() Group by the fecha column
 * @method     StatusQuery groupByIdExpositorFeria() Group by the id_expositor_feria column
 * @method     StatusQuery groupByStatusActual() Group by the status_actual column
 * @method     StatusQuery groupByIdPagoExpositor() Group by the id_pago_expositor column
 *
 * @method     StatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     StatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     StatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     StatusQuery leftJoinFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feria relation
 * @method     StatusQuery rightJoinFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feria relation
 * @method     StatusQuery innerJoinFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the Feria relation
 *
 * @method     StatusQuery leftJoinExpositor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expositor relation
 * @method     StatusQuery rightJoinExpositor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expositor relation
 * @method     StatusQuery innerJoinExpositor($relationAlias = null) Adds a INNER JOIN clause to the query using the Expositor relation
 *
 * @method     StatusQuery leftJoinTipoStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the TipoStatus relation
 * @method     StatusQuery rightJoinTipoStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TipoStatus relation
 * @method     StatusQuery innerJoinTipoStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the TipoStatus relation
 *
 * @method     StatusQuery leftJoinExpositorFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpositorFeria relation
 * @method     StatusQuery rightJoinExpositorFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpositorFeria relation
 * @method     StatusQuery innerJoinExpositorFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpositorFeria relation
 *
 * @method     StatusQuery leftJoinPagoExpositor($relationAlias = null) Adds a LEFT JOIN clause to the query using the PagoExpositor relation
 * @method     StatusQuery rightJoinPagoExpositor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PagoExpositor relation
 * @method     StatusQuery innerJoinPagoExpositor($relationAlias = null) Adds a INNER JOIN clause to the query using the PagoExpositor relation
 *
 * @method     Status findOne(PropelPDO $con = null) Return the first Status matching the query
 * @method     Status findOneOrCreate(PropelPDO $con = null) Return the first Status matching the query, or a new Status object populated from the query conditions when no match is found
 *
 * @method     Status findOneById(string $id) Return the first Status filtered by the id column
 * @method     Status findOneByIdFeria(int $id_feria) Return the first Status filtered by the id_feria column
 * @method     Status findOneByIdExpositor(int $id_expositor) Return the first Status filtered by the id_expositor column
 * @method     Status findOneByIdStatus(int $id_status) Return the first Status filtered by the id_status column
 * @method     Status findOneByObservaciones(string $observaciones) Return the first Status filtered by the observaciones column
 * @method     Status findOneByFecha(string $fecha) Return the first Status filtered by the fecha column
 * @method     Status findOneByIdExpositorFeria(int $id_expositor_feria) Return the first Status filtered by the id_expositor_feria column
 * @method     Status findOneByStatusActual(boolean $status_actual) Return the first Status filtered by the status_actual column
 * @method     Status findOneByIdPagoExpositor(int $id_pago_expositor) Return the first Status filtered by the id_pago_expositor column
 *
 * @method     array findById(string $id) Return Status objects filtered by the id column
 * @method     array findByIdFeria(int $id_feria) Return Status objects filtered by the id_feria column
 * @method     array findByIdExpositor(int $id_expositor) Return Status objects filtered by the id_expositor column
 * @method     array findByIdStatus(int $id_status) Return Status objects filtered by the id_status column
 * @method     array findByObservaciones(string $observaciones) Return Status objects filtered by the observaciones column
 * @method     array findByFecha(string $fecha) Return Status objects filtered by the fecha column
 * @method     array findByIdExpositorFeria(int $id_expositor_feria) Return Status objects filtered by the id_expositor_feria column
 * @method     array findByStatusActual(boolean $status_actual) Return Status objects filtered by the status_actual column
 * @method     array findByIdPagoExpositor(int $id_pago_expositor) Return Status objects filtered by the id_pago_expositor column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseStatusQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseStatusQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Status', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new StatusQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    StatusQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof StatusQuery) {
			return $criteria;
		}
		$query = new StatusQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Status|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = StatusPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(StatusPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(StatusPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(StatusPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_feria column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdFeria(1234); // WHERE id_feria = 1234
	 * $query->filterByIdFeria(array(12, 34)); // WHERE id_feria IN (12, 34)
	 * $query->filterByIdFeria(array('min' => 12)); // WHERE id_feria > 12
	 * </code>
	 *
	 * @see       filterByFeria()
	 *
	 * @param     mixed $idFeria The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByIdFeria($idFeria = null, $comparison = null)
	{
		if (is_array($idFeria)) {
			$useMinMax = false;
			if (isset($idFeria['min'])) {
				$this->addUsingAlias(StatusPeer::ID_FERIA, $idFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idFeria['max'])) {
				$this->addUsingAlias(StatusPeer::ID_FERIA, $idFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StatusPeer::ID_FERIA, $idFeria, $comparison);
	}

	/**
	 * Filter the query on the id_expositor column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdExpositor(1234); // WHERE id_expositor = 1234
	 * $query->filterByIdExpositor(array(12, 34)); // WHERE id_expositor IN (12, 34)
	 * $query->filterByIdExpositor(array('min' => 12)); // WHERE id_expositor > 12
	 * </code>
	 *
	 * @see       filterByExpositor()
	 *
	 * @param     mixed $idExpositor The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByIdExpositor($idExpositor = null, $comparison = null)
	{
		if (is_array($idExpositor)) {
			$useMinMax = false;
			if (isset($idExpositor['min'])) {
				$this->addUsingAlias(StatusPeer::ID_EXPOSITOR, $idExpositor['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idExpositor['max'])) {
				$this->addUsingAlias(StatusPeer::ID_EXPOSITOR, $idExpositor['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StatusPeer::ID_EXPOSITOR, $idExpositor, $comparison);
	}

	/**
	 * Filter the query on the id_status column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdStatus(1234); // WHERE id_status = 1234
	 * $query->filterByIdStatus(array(12, 34)); // WHERE id_status IN (12, 34)
	 * $query->filterByIdStatus(array('min' => 12)); // WHERE id_status > 12
	 * </code>
	 *
	 * @see       filterByTipoStatus()
	 *
	 * @param     mixed $idStatus The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByIdStatus($idStatus = null, $comparison = null)
	{
		if (is_array($idStatus)) {
			$useMinMax = false;
			if (isset($idStatus['min'])) {
				$this->addUsingAlias(StatusPeer::ID_STATUS, $idStatus['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idStatus['max'])) {
				$this->addUsingAlias(StatusPeer::ID_STATUS, $idStatus['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StatusPeer::ID_STATUS, $idStatus, $comparison);
	}

	/**
	 * Filter the query on the observaciones column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByObservaciones('fooValue');   // WHERE observaciones = 'fooValue'
	 * $query->filterByObservaciones('%fooValue%'); // WHERE observaciones LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $observaciones The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByObservaciones($observaciones = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($observaciones)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $observaciones)) {
				$observaciones = str_replace('*', '%', $observaciones);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(StatusPeer::OBSERVACIONES, $observaciones, $comparison);
	}

	/**
	 * Filter the query on the fecha column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByFecha('2011-03-14'); // WHERE fecha = '2011-03-14'
	 * $query->filterByFecha('now'); // WHERE fecha = '2011-03-14'
	 * $query->filterByFecha(array('max' => 'yesterday')); // WHERE fecha > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $fecha The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(StatusPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(StatusPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StatusPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query on the id_expositor_feria column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdExpositorFeria(1234); // WHERE id_expositor_feria = 1234
	 * $query->filterByIdExpositorFeria(array(12, 34)); // WHERE id_expositor_feria IN (12, 34)
	 * $query->filterByIdExpositorFeria(array('min' => 12)); // WHERE id_expositor_feria > 12
	 * </code>
	 *
	 * @see       filterByExpositorFeria()
	 *
	 * @param     mixed $idExpositorFeria The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByIdExpositorFeria($idExpositorFeria = null, $comparison = null)
	{
		if (is_array($idExpositorFeria)) {
			$useMinMax = false;
			if (isset($idExpositorFeria['min'])) {
				$this->addUsingAlias(StatusPeer::ID_EXPOSITOR_FERIA, $idExpositorFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idExpositorFeria['max'])) {
				$this->addUsingAlias(StatusPeer::ID_EXPOSITOR_FERIA, $idExpositorFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StatusPeer::ID_EXPOSITOR_FERIA, $idExpositorFeria, $comparison);
	}

	/**
	 * Filter the query on the status_actual column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByStatusActual(true); // WHERE status_actual = true
	 * $query->filterByStatusActual('yes'); // WHERE status_actual = true
	 * </code>
	 *
	 * @param     boolean|string $statusActual The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByStatusActual($statusActual = null, $comparison = null)
	{
		if (is_string($statusActual)) {
			$status_actual = in_array(strtolower($statusActual), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(StatusPeer::STATUS_ACTUAL, $statusActual, $comparison);
	}

	/**
	 * Filter the query on the id_pago_expositor column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdPagoExpositor(1234); // WHERE id_pago_expositor = 1234
	 * $query->filterByIdPagoExpositor(array(12, 34)); // WHERE id_pago_expositor IN (12, 34)
	 * $query->filterByIdPagoExpositor(array('min' => 12)); // WHERE id_pago_expositor > 12
	 * </code>
	 *
	 * @see       filterByPagoExpositor()
	 *
	 * @param     mixed $idPagoExpositor The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByIdPagoExpositor($idPagoExpositor = null, $comparison = null)
	{
		if (is_array($idPagoExpositor)) {
			$useMinMax = false;
			if (isset($idPagoExpositor['min'])) {
				$this->addUsingAlias(StatusPeer::ID_PAGO_EXPOSITOR, $idPagoExpositor['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idPagoExpositor['max'])) {
				$this->addUsingAlias(StatusPeer::ID_PAGO_EXPOSITOR, $idPagoExpositor['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StatusPeer::ID_PAGO_EXPOSITOR, $idPagoExpositor, $comparison);
	}

	/**
	 * Filter the query by a related Feria object
	 *
	 * @param     Feria|PropelCollection $feria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByFeria($feria, $comparison = null)
	{
		if ($feria instanceof Feria) {
			return $this
				->addUsingAlias(StatusPeer::ID_FERIA, $feria->getId(), $comparison);
		} elseif ($feria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(StatusPeer::ID_FERIA, $feria->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByFeria() only accepts arguments of type Feria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Feria relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function joinFeria($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Feria');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Feria');
		}
		
		return $this;
	}

	/**
	 * Use the Feria relation Feria object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FeriaQuery A secondary query class using the current class as primary query
	 */
	public function useFeriaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinFeria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Feria', 'FeriaQuery');
	}

	/**
	 * Filter the query by a related Expositor object
	 *
	 * @param     Expositor|PropelCollection $expositor The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByExpositor($expositor, $comparison = null)
	{
		if ($expositor instanceof Expositor) {
			return $this
				->addUsingAlias(StatusPeer::ID_EXPOSITOR, $expositor->getId(), $comparison);
		} elseif ($expositor instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(StatusPeer::ID_EXPOSITOR, $expositor->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByExpositor() only accepts arguments of type Expositor or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Expositor relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function joinExpositor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Expositor');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Expositor');
		}
		
		return $this;
	}

	/**
	 * Use the Expositor relation Expositor object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ExpositorQuery A secondary query class using the current class as primary query
	 */
	public function useExpositorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinExpositor($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Expositor', 'ExpositorQuery');
	}

	/**
	 * Filter the query by a related TipoStatus object
	 *
	 * @param     TipoStatus|PropelCollection $tipoStatus The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByTipoStatus($tipoStatus, $comparison = null)
	{
		if ($tipoStatus instanceof TipoStatus) {
			return $this
				->addUsingAlias(StatusPeer::ID_STATUS, $tipoStatus->getId(), $comparison);
		} elseif ($tipoStatus instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(StatusPeer::ID_STATUS, $tipoStatus->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTipoStatus() only accepts arguments of type TipoStatus or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TipoStatus relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function joinTipoStatus($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TipoStatus');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'TipoStatus');
		}
		
		return $this;
	}

	/**
	 * Use the TipoStatus relation TipoStatus object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TipoStatusQuery A secondary query class using the current class as primary query
	 */
	public function useTipoStatusQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTipoStatus($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TipoStatus', 'TipoStatusQuery');
	}

	/**
	 * Filter the query by a related ExpositorFeria object
	 *
	 * @param     ExpositorFeria|PropelCollection $expositorFeria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByExpositorFeria($expositorFeria, $comparison = null)
	{
		if ($expositorFeria instanceof ExpositorFeria) {
			return $this
				->addUsingAlias(StatusPeer::ID_EXPOSITOR_FERIA, $expositorFeria->getId(), $comparison);
		} elseif ($expositorFeria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(StatusPeer::ID_EXPOSITOR_FERIA, $expositorFeria->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByExpositorFeria() only accepts arguments of type ExpositorFeria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ExpositorFeria relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function joinExpositorFeria($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ExpositorFeria');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'ExpositorFeria');
		}
		
		return $this;
	}

	/**
	 * Use the ExpositorFeria relation ExpositorFeria object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ExpositorFeriaQuery A secondary query class using the current class as primary query
	 */
	public function useExpositorFeriaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinExpositorFeria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ExpositorFeria', 'ExpositorFeriaQuery');
	}

	/**
	 * Filter the query by a related PagoExpositor object
	 *
	 * @param     PagoExpositor|PropelCollection $pagoExpositor The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function filterByPagoExpositor($pagoExpositor, $comparison = null)
	{
		if ($pagoExpositor instanceof PagoExpositor) {
			return $this
				->addUsingAlias(StatusPeer::ID_PAGO_EXPOSITOR, $pagoExpositor->getId(), $comparison);
		} elseif ($pagoExpositor instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(StatusPeer::ID_PAGO_EXPOSITOR, $pagoExpositor->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPagoExpositor() only accepts arguments of type PagoExpositor or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PagoExpositor relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function joinPagoExpositor($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PagoExpositor');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'PagoExpositor');
		}
		
		return $this;
	}

	/**
	 * Use the PagoExpositor relation PagoExpositor object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PagoExpositorQuery A secondary query class using the current class as primary query
	 */
	public function usePagoExpositorQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPagoExpositor($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PagoExpositor', 'PagoExpositorQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Status $status Object to remove from the list of results
	 *
	 * @return    StatusQuery The current query, for fluid interface
	 */
	public function prune($status = null)
	{
		if ($status) {
			$this->addUsingAlias(StatusPeer::ID, $status->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseStatusQuery
