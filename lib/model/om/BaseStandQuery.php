<?php


/**
 * Base class that represents a query for the 'stand' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Fri May  1 16:52:45 2015
 *
 * @method     StandQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     StandQuery orderByIdFeria($order = Criteria::ASC) Order by the id_feria column
 * @method     StandQuery orderByMetros($order = Criteria::ASC) Order by the metros column
 * @method     StandQuery orderByCostoBs($order = Criteria::ASC) Order by the costo_bs column
 * @method     StandQuery orderByCostoDs($order = Criteria::ASC) Order by the costo_ds column
 *
 * @method     StandQuery groupById() Group by the id column
 * @method     StandQuery groupByIdFeria() Group by the id_feria column
 * @method     StandQuery groupByMetros() Group by the metros column
 * @method     StandQuery groupByCostoBs() Group by the costo_bs column
 * @method     StandQuery groupByCostoDs() Group by the costo_ds column
 *
 * @method     StandQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     StandQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     StandQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     StandQuery leftJoinFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feria relation
 * @method     StandQuery rightJoinFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feria relation
 * @method     StandQuery innerJoinFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the Feria relation
 *
 * @method     StandQuery leftJoinExpositorFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpositorFeria relation
 * @method     StandQuery rightJoinExpositorFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpositorFeria relation
 * @method     StandQuery innerJoinExpositorFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpositorFeria relation
 *
 * @method     Stand findOne(PropelPDO $con = null) Return the first Stand matching the query
 * @method     Stand findOneOrCreate(PropelPDO $con = null) Return the first Stand matching the query, or a new Stand object populated from the query conditions when no match is found
 *
 * @method     Stand findOneById(string $id) Return the first Stand filtered by the id column
 * @method     Stand findOneByIdFeria(int $id_feria) Return the first Stand filtered by the id_feria column
 * @method     Stand findOneByMetros(string $metros) Return the first Stand filtered by the metros column
 * @method     Stand findOneByCostoBs(string $costo_bs) Return the first Stand filtered by the costo_bs column
 * @method     Stand findOneByCostoDs(string $costo_ds) Return the first Stand filtered by the costo_ds column
 *
 * @method     array findById(string $id) Return Stand objects filtered by the id column
 * @method     array findByIdFeria(int $id_feria) Return Stand objects filtered by the id_feria column
 * @method     array findByMetros(string $metros) Return Stand objects filtered by the metros column
 * @method     array findByCostoBs(string $costo_bs) Return Stand objects filtered by the costo_bs column
 * @method     array findByCostoDs(string $costo_ds) Return Stand objects filtered by the costo_ds column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseStandQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseStandQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Stand', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new StandQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    StandQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof StandQuery) {
			return $criteria;
		}
		$query = new StandQuery();
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
	 * @return    Stand|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = StandPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(StandPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(StandPeer::ID, $keys, Criteria::IN);
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
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(StandPeer::ID, $id, $comparison);
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
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterByIdFeria($idFeria = null, $comparison = null)
	{
		if (is_array($idFeria)) {
			$useMinMax = false;
			if (isset($idFeria['min'])) {
				$this->addUsingAlias(StandPeer::ID_FERIA, $idFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idFeria['max'])) {
				$this->addUsingAlias(StandPeer::ID_FERIA, $idFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(StandPeer::ID_FERIA, $idFeria, $comparison);
	}

	/**
	 * Filter the query on the metros column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByMetros('fooValue');   // WHERE metros = 'fooValue'
	 * $query->filterByMetros('%fooValue%'); // WHERE metros LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $metros The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterByMetros($metros = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($metros)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $metros)) {
				$metros = str_replace('*', '%', $metros);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(StandPeer::METROS, $metros, $comparison);
	}

	/**
	 * Filter the query on the costo_bs column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCostoBs('fooValue');   // WHERE costo_bs = 'fooValue'
	 * $query->filterByCostoBs('%fooValue%'); // WHERE costo_bs LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $costoBs The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterByCostoBs($costoBs = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($costoBs)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $costoBs)) {
				$costoBs = str_replace('*', '%', $costoBs);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(StandPeer::COSTO_BS, $costoBs, $comparison);
	}

	/**
	 * Filter the query on the costo_ds column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCostoDs('fooValue');   // WHERE costo_ds = 'fooValue'
	 * $query->filterByCostoDs('%fooValue%'); // WHERE costo_ds LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $costoDs The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterByCostoDs($costoDs = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($costoDs)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $costoDs)) {
				$costoDs = str_replace('*', '%', $costoDs);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(StandPeer::COSTO_DS, $costoDs, $comparison);
	}

	/**
	 * Filter the query by a related Feria object
	 *
	 * @param     Feria|PropelCollection $feria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterByFeria($feria, $comparison = null)
	{
		if ($feria instanceof Feria) {
			return $this
				->addUsingAlias(StandPeer::ID_FERIA, $feria->getId(), $comparison);
		} elseif ($feria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(StandPeer::ID_FERIA, $feria->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    StandQuery The current query, for fluid interface
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
	 * Filter the query by a related ExpositorFeria object
	 *
	 * @param     ExpositorFeria $expositorFeria  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function filterByExpositorFeria($expositorFeria, $comparison = null)
	{
		if ($expositorFeria instanceof ExpositorFeria) {
			return $this
				->addUsingAlias(StandPeer::ID, $expositorFeria->getIdStand(), $comparison);
		} elseif ($expositorFeria instanceof PropelCollection) {
			return $this
				->useExpositorFeriaQuery()
					->filterByPrimaryKeys($expositorFeria->getPrimaryKeys())
				->endUse();
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
	 * @return    StandQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Stand $stand Object to remove from the list of results
	 *
	 * @return    StandQuery The current query, for fluid interface
	 */
	public function prune($stand = null)
	{
		if ($stand) {
			$this->addUsingAlias(StandPeer::ID, $stand->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseStandQuery
