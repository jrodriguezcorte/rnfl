<?php


/**
 * Base class that represents a query for the 'actividad_tipo_actividad' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon May 11 16:29:19 2015
 *
 * @method     ActividadTipoActividadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ActividadTipoActividadQuery orderByIdActividad($order = Criteria::ASC) Order by the id_actividad column
 * @method     ActividadTipoActividadQuery orderByIdTipoActividad($order = Criteria::ASC) Order by the id_tipo_actividad column
 *
 * @method     ActividadTipoActividadQuery groupById() Group by the id column
 * @method     ActividadTipoActividadQuery groupByIdActividad() Group by the id_actividad column
 * @method     ActividadTipoActividadQuery groupByIdTipoActividad() Group by the id_tipo_actividad column
 *
 * @method     ActividadTipoActividadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ActividadTipoActividadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ActividadTipoActividadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ActividadTipoActividadQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     ActividadTipoActividadQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     ActividadTipoActividadQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     ActividadTipoActividadQuery leftJoinTipoActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the TipoActividad relation
 * @method     ActividadTipoActividadQuery rightJoinTipoActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TipoActividad relation
 * @method     ActividadTipoActividadQuery innerJoinTipoActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the TipoActividad relation
 *
 * @method     ActividadTipoActividad findOne(PropelPDO $con = null) Return the first ActividadTipoActividad matching the query
 * @method     ActividadTipoActividad findOneOrCreate(PropelPDO $con = null) Return the first ActividadTipoActividad matching the query, or a new ActividadTipoActividad object populated from the query conditions when no match is found
 *
 * @method     ActividadTipoActividad findOneById(string $id) Return the first ActividadTipoActividad filtered by the id column
 * @method     ActividadTipoActividad findOneByIdActividad(int $id_actividad) Return the first ActividadTipoActividad filtered by the id_actividad column
 * @method     ActividadTipoActividad findOneByIdTipoActividad(int $id_tipo_actividad) Return the first ActividadTipoActividad filtered by the id_tipo_actividad column
 *
 * @method     array findById(string $id) Return ActividadTipoActividad objects filtered by the id column
 * @method     array findByIdActividad(int $id_actividad) Return ActividadTipoActividad objects filtered by the id_actividad column
 * @method     array findByIdTipoActividad(int $id_tipo_actividad) Return ActividadTipoActividad objects filtered by the id_tipo_actividad column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseActividadTipoActividadQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseActividadTipoActividadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ActividadTipoActividad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ActividadTipoActividadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ActividadTipoActividadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ActividadTipoActividadQuery) {
			return $criteria;
		}
		$query = new ActividadTipoActividadQuery();
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
	 * @return    ActividadTipoActividad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ActividadTipoActividadPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ActividadTipoActividadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ActividadTipoActividadPeer::ID, $keys, Criteria::IN);
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
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ActividadTipoActividadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_actividad column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdActividad(1234); // WHERE id_actividad = 1234
	 * $query->filterByIdActividad(array(12, 34)); // WHERE id_actividad IN (12, 34)
	 * $query->filterByIdActividad(array('min' => 12)); // WHERE id_actividad > 12
	 * </code>
	 *
	 * @see       filterByActividad()
	 *
	 * @param     mixed $idActividad The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function filterByIdActividad($idActividad = null, $comparison = null)
	{
		if (is_array($idActividad)) {
			$useMinMax = false;
			if (isset($idActividad['min'])) {
				$this->addUsingAlias(ActividadTipoActividadPeer::ID_ACTIVIDAD, $idActividad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idActividad['max'])) {
				$this->addUsingAlias(ActividadTipoActividadPeer::ID_ACTIVIDAD, $idActividad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadTipoActividadPeer::ID_ACTIVIDAD, $idActividad, $comparison);
	}

	/**
	 * Filter the query on the id_tipo_actividad column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdTipoActividad(1234); // WHERE id_tipo_actividad = 1234
	 * $query->filterByIdTipoActividad(array(12, 34)); // WHERE id_tipo_actividad IN (12, 34)
	 * $query->filterByIdTipoActividad(array('min' => 12)); // WHERE id_tipo_actividad > 12
	 * </code>
	 *
	 * @see       filterByTipoActividad()
	 *
	 * @param     mixed $idTipoActividad The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function filterByIdTipoActividad($idTipoActividad = null, $comparison = null)
	{
		if (is_array($idTipoActividad)) {
			$useMinMax = false;
			if (isset($idTipoActividad['min'])) {
				$this->addUsingAlias(ActividadTipoActividadPeer::ID_TIPO_ACTIVIDAD, $idTipoActividad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idTipoActividad['max'])) {
				$this->addUsingAlias(ActividadTipoActividadPeer::ID_TIPO_ACTIVIDAD, $idTipoActividad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadTipoActividadPeer::ID_TIPO_ACTIVIDAD, $idTipoActividad, $comparison);
	}

	/**
	 * Filter the query by a related Actividad object
	 *
	 * @param     Actividad|PropelCollection $actividad The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function filterByActividad($actividad, $comparison = null)
	{
		if ($actividad instanceof Actividad) {
			return $this
				->addUsingAlias(ActividadTipoActividadPeer::ID_ACTIVIDAD, $actividad->getId(), $comparison);
		} elseif ($actividad instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ActividadTipoActividadPeer::ID_ACTIVIDAD, $actividad->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByActividad() only accepts arguments of type Actividad or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Actividad relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function joinActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Actividad');
		
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
			$this->addJoinObject($join, 'Actividad');
		}
		
		return $this;
	}

	/**
	 * Use the Actividad relation Actividad object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActividadQuery A secondary query class using the current class as primary query
	 */
	public function useActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinActividad($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Actividad', 'ActividadQuery');
	}

	/**
	 * Filter the query by a related TipoActividad object
	 *
	 * @param     TipoActividad|PropelCollection $tipoActividad The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function filterByTipoActividad($tipoActividad, $comparison = null)
	{
		if ($tipoActividad instanceof TipoActividad) {
			return $this
				->addUsingAlias(ActividadTipoActividadPeer::ID_TIPO_ACTIVIDAD, $tipoActividad->getId(), $comparison);
		} elseif ($tipoActividad instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ActividadTipoActividadPeer::ID_TIPO_ACTIVIDAD, $tipoActividad->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTipoActividad() only accepts arguments of type TipoActividad or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TipoActividad relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function joinTipoActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TipoActividad');
		
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
			$this->addJoinObject($join, 'TipoActividad');
		}
		
		return $this;
	}

	/**
	 * Use the TipoActividad relation TipoActividad object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TipoActividadQuery A secondary query class using the current class as primary query
	 */
	public function useTipoActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTipoActividad($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TipoActividad', 'TipoActividadQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ActividadTipoActividad $actividadTipoActividad Object to remove from the list of results
	 *
	 * @return    ActividadTipoActividadQuery The current query, for fluid interface
	 */
	public function prune($actividadTipoActividad = null)
	{
		if ($actividadTipoActividad) {
			$this->addUsingAlias(ActividadTipoActividadPeer::ID, $actividadTipoActividad->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseActividadTipoActividadQuery
