<?php


/**
 * Base class that represents a query for the 'ponente_actividad' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon Jan 12 13:12:44 2015
 *
 * @method     PonenteActividadQuery orderByIdPonente($order = Criteria::ASC) Order by the id_ponente column
 * @method     PonenteActividadQuery orderByIdActividad($order = Criteria::ASC) Order by the id_actividad column
 * @method     PonenteActividadQuery orderByIdFeria($order = Criteria::ASC) Order by the id_feria column
 * @method     PonenteActividadQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     PonenteActividadQuery groupByIdPonente() Group by the id_ponente column
 * @method     PonenteActividadQuery groupByIdActividad() Group by the id_actividad column
 * @method     PonenteActividadQuery groupByIdFeria() Group by the id_feria column
 * @method     PonenteActividadQuery groupById() Group by the id column
 *
 * @method     PonenteActividadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PonenteActividadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PonenteActividadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PonenteActividadQuery leftJoinPonente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ponente relation
 * @method     PonenteActividadQuery rightJoinPonente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ponente relation
 * @method     PonenteActividadQuery innerJoinPonente($relationAlias = null) Adds a INNER JOIN clause to the query using the Ponente relation
 *
 * @method     PonenteActividadQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     PonenteActividadQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     PonenteActividadQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     PonenteActividadQuery leftJoinFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feria relation
 * @method     PonenteActividadQuery rightJoinFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feria relation
 * @method     PonenteActividadQuery innerJoinFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the Feria relation
 *
 * @method     PonenteActividad findOne(PropelPDO $con = null) Return the first PonenteActividad matching the query
 * @method     PonenteActividad findOneOrCreate(PropelPDO $con = null) Return the first PonenteActividad matching the query, or a new PonenteActividad object populated from the query conditions when no match is found
 *
 * @method     PonenteActividad findOneByIdPonente(int $id_ponente) Return the first PonenteActividad filtered by the id_ponente column
 * @method     PonenteActividad findOneByIdActividad(int $id_actividad) Return the first PonenteActividad filtered by the id_actividad column
 * @method     PonenteActividad findOneByIdFeria(int $id_feria) Return the first PonenteActividad filtered by the id_feria column
 * @method     PonenteActividad findOneById(string $id) Return the first PonenteActividad filtered by the id column
 *
 * @method     array findByIdPonente(int $id_ponente) Return PonenteActividad objects filtered by the id_ponente column
 * @method     array findByIdActividad(int $id_actividad) Return PonenteActividad objects filtered by the id_actividad column
 * @method     array findByIdFeria(int $id_feria) Return PonenteActividad objects filtered by the id_feria column
 * @method     array findById(string $id) Return PonenteActividad objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePonenteActividadQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePonenteActividadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PonenteActividad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PonenteActividadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PonenteActividadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PonenteActividadQuery) {
			return $criteria;
		}
		$query = new PonenteActividadQuery();
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
	 * @return    PonenteActividad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PonenteActividadPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PonenteActividadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PonenteActividadPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_ponente column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdPonente(1234); // WHERE id_ponente = 1234
	 * $query->filterByIdPonente(array(12, 34)); // WHERE id_ponente IN (12, 34)
	 * $query->filterByIdPonente(array('min' => 12)); // WHERE id_ponente > 12
	 * </code>
	 *
	 * @see       filterByPonente()
	 *
	 * @param     mixed $idPonente The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterByIdPonente($idPonente = null, $comparison = null)
	{
		if (is_array($idPonente)) {
			$useMinMax = false;
			if (isset($idPonente['min'])) {
				$this->addUsingAlias(PonenteActividadPeer::ID_PONENTE, $idPonente['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idPonente['max'])) {
				$this->addUsingAlias(PonenteActividadPeer::ID_PONENTE, $idPonente['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PonenteActividadPeer::ID_PONENTE, $idPonente, $comparison);
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
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterByIdActividad($idActividad = null, $comparison = null)
	{
		if (is_array($idActividad)) {
			$useMinMax = false;
			if (isset($idActividad['min'])) {
				$this->addUsingAlias(PonenteActividadPeer::ID_ACTIVIDAD, $idActividad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idActividad['max'])) {
				$this->addUsingAlias(PonenteActividadPeer::ID_ACTIVIDAD, $idActividad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PonenteActividadPeer::ID_ACTIVIDAD, $idActividad, $comparison);
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
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterByIdFeria($idFeria = null, $comparison = null)
	{
		if (is_array($idFeria)) {
			$useMinMax = false;
			if (isset($idFeria['min'])) {
				$this->addUsingAlias(PonenteActividadPeer::ID_FERIA, $idFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idFeria['max'])) {
				$this->addUsingAlias(PonenteActividadPeer::ID_FERIA, $idFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PonenteActividadPeer::ID_FERIA, $idFeria, $comparison);
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
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PonenteActividadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query by a related Ponente object
	 *
	 * @param     Ponente|PropelCollection $ponente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterByPonente($ponente, $comparison = null)
	{
		if ($ponente instanceof Ponente) {
			return $this
				->addUsingAlias(PonenteActividadPeer::ID_PONENTE, $ponente->getId(), $comparison);
		} elseif ($ponente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PonenteActividadPeer::ID_PONENTE, $ponente->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPonente() only accepts arguments of type Ponente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Ponente relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function joinPonente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Ponente');
		
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
			$this->addJoinObject($join, 'Ponente');
		}
		
		return $this;
	}

	/**
	 * Use the Ponente relation Ponente object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteQuery A secondary query class using the current class as primary query
	 */
	public function usePonenteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPonente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Ponente', 'PonenteQuery');
	}

	/**
	 * Filter the query by a related Actividad object
	 *
	 * @param     Actividad|PropelCollection $actividad The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterByActividad($actividad, $comparison = null)
	{
		if ($actividad instanceof Actividad) {
			return $this
				->addUsingAlias(PonenteActividadPeer::ID_ACTIVIDAD, $actividad->getId(), $comparison);
		} elseif ($actividad instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PonenteActividadPeer::ID_ACTIVIDAD, $actividad->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PonenteActividadQuery The current query, for fluid interface
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
	 * Filter the query by a related Feria object
	 *
	 * @param     Feria|PropelCollection $feria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function filterByFeria($feria, $comparison = null)
	{
		if ($feria instanceof Feria) {
			return $this
				->addUsingAlias(PonenteActividadPeer::ID_FERIA, $feria->getId(), $comparison);
		} elseif ($feria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PonenteActividadPeer::ID_FERIA, $feria->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PonenteActividadQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     PonenteActividad $ponenteActividad Object to remove from the list of results
	 *
	 * @return    PonenteActividadQuery The current query, for fluid interface
	 */
	public function prune($ponenteActividad = null)
	{
		if ($ponenteActividad) {
			$this->addUsingAlias(PonenteActividadPeer::ID, $ponenteActividad->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePonenteActividadQuery
