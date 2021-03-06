<?php


/**
 * Base class that represents a query for the 'expositor_selloeditorial' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Sun Dec 21 18:54:22 2014
 *
 * @method     ExpositorSelloeditorialQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ExpositorSelloeditorialQuery orderByIdFeria($order = Criteria::ASC) Order by the id_feria column
 * @method     ExpositorSelloeditorialQuery orderByIdExpositor($order = Criteria::ASC) Order by the id_expositor column
 * @method     ExpositorSelloeditorialQuery orderByIdSelloEditorial($order = Criteria::ASC) Order by the id_sello_editorial column
 *
 * @method     ExpositorSelloeditorialQuery groupById() Group by the id column
 * @method     ExpositorSelloeditorialQuery groupByIdFeria() Group by the id_feria column
 * @method     ExpositorSelloeditorialQuery groupByIdExpositor() Group by the id_expositor column
 * @method     ExpositorSelloeditorialQuery groupByIdSelloEditorial() Group by the id_sello_editorial column
 *
 * @method     ExpositorSelloeditorialQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ExpositorSelloeditorialQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ExpositorSelloeditorialQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ExpositorSelloeditorialQuery leftJoinFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feria relation
 * @method     ExpositorSelloeditorialQuery rightJoinFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feria relation
 * @method     ExpositorSelloeditorialQuery innerJoinFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the Feria relation
 *
 * @method     ExpositorSelloeditorialQuery leftJoinExpositor($relationAlias = null) Adds a LEFT JOIN clause to the query using the Expositor relation
 * @method     ExpositorSelloeditorialQuery rightJoinExpositor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Expositor relation
 * @method     ExpositorSelloeditorialQuery innerJoinExpositor($relationAlias = null) Adds a INNER JOIN clause to the query using the Expositor relation
 *
 * @method     ExpositorSelloeditorialQuery leftJoinSelloEditorial($relationAlias = null) Adds a LEFT JOIN clause to the query using the SelloEditorial relation
 * @method     ExpositorSelloeditorialQuery rightJoinSelloEditorial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SelloEditorial relation
 * @method     ExpositorSelloeditorialQuery innerJoinSelloEditorial($relationAlias = null) Adds a INNER JOIN clause to the query using the SelloEditorial relation
 *
 * @method     ExpositorSelloeditorial findOne(PropelPDO $con = null) Return the first ExpositorSelloeditorial matching the query
 * @method     ExpositorSelloeditorial findOneOrCreate(PropelPDO $con = null) Return the first ExpositorSelloeditorial matching the query, or a new ExpositorSelloeditorial object populated from the query conditions when no match is found
 *
 * @method     ExpositorSelloeditorial findOneById(string $id) Return the first ExpositorSelloeditorial filtered by the id column
 * @method     ExpositorSelloeditorial findOneByIdFeria(int $id_feria) Return the first ExpositorSelloeditorial filtered by the id_feria column
 * @method     ExpositorSelloeditorial findOneByIdExpositor(int $id_expositor) Return the first ExpositorSelloeditorial filtered by the id_expositor column
 * @method     ExpositorSelloeditorial findOneByIdSelloEditorial(int $id_sello_editorial) Return the first ExpositorSelloeditorial filtered by the id_sello_editorial column
 *
 * @method     array findById(string $id) Return ExpositorSelloeditorial objects filtered by the id column
 * @method     array findByIdFeria(int $id_feria) Return ExpositorSelloeditorial objects filtered by the id_feria column
 * @method     array findByIdExpositor(int $id_expositor) Return ExpositorSelloeditorial objects filtered by the id_expositor column
 * @method     array findByIdSelloEditorial(int $id_sello_editorial) Return ExpositorSelloeditorial objects filtered by the id_sello_editorial column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseExpositorSelloeditorialQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseExpositorSelloeditorialQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'ExpositorSelloeditorial', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ExpositorSelloeditorialQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ExpositorSelloeditorialQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ExpositorSelloeditorialQuery) {
			return $criteria;
		}
		$query = new ExpositorSelloeditorialQuery();
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
	 * @return    ExpositorSelloeditorial|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ExpositorSelloeditorialPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ExpositorSelloeditorialPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ExpositorSelloeditorialPeer::ID, $keys, Criteria::IN);
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
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ExpositorSelloeditorialPeer::ID, $id, $comparison);
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
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterByIdFeria($idFeria = null, $comparison = null)
	{
		if (is_array($idFeria)) {
			$useMinMax = false;
			if (isset($idFeria['min'])) {
				$this->addUsingAlias(ExpositorSelloeditorialPeer::ID_FERIA, $idFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idFeria['max'])) {
				$this->addUsingAlias(ExpositorSelloeditorialPeer::ID_FERIA, $idFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ExpositorSelloeditorialPeer::ID_FERIA, $idFeria, $comparison);
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
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterByIdExpositor($idExpositor = null, $comparison = null)
	{
		if (is_array($idExpositor)) {
			$useMinMax = false;
			if (isset($idExpositor['min'])) {
				$this->addUsingAlias(ExpositorSelloeditorialPeer::ID_EXPOSITOR, $idExpositor['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idExpositor['max'])) {
				$this->addUsingAlias(ExpositorSelloeditorialPeer::ID_EXPOSITOR, $idExpositor['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ExpositorSelloeditorialPeer::ID_EXPOSITOR, $idExpositor, $comparison);
	}

	/**
	 * Filter the query on the id_sello_editorial column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdSelloEditorial(1234); // WHERE id_sello_editorial = 1234
	 * $query->filterByIdSelloEditorial(array(12, 34)); // WHERE id_sello_editorial IN (12, 34)
	 * $query->filterByIdSelloEditorial(array('min' => 12)); // WHERE id_sello_editorial > 12
	 * </code>
	 *
	 * @see       filterBySelloEditorial()
	 *
	 * @param     mixed $idSelloEditorial The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterByIdSelloEditorial($idSelloEditorial = null, $comparison = null)
	{
		if (is_array($idSelloEditorial)) {
			$useMinMax = false;
			if (isset($idSelloEditorial['min'])) {
				$this->addUsingAlias(ExpositorSelloeditorialPeer::ID_SELLO_EDITORIAL, $idSelloEditorial['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idSelloEditorial['max'])) {
				$this->addUsingAlias(ExpositorSelloeditorialPeer::ID_SELLO_EDITORIAL, $idSelloEditorial['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ExpositorSelloeditorialPeer::ID_SELLO_EDITORIAL, $idSelloEditorial, $comparison);
	}

	/**
	 * Filter the query by a related Feria object
	 *
	 * @param     Feria|PropelCollection $feria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterByFeria($feria, $comparison = null)
	{
		if ($feria instanceof Feria) {
			return $this
				->addUsingAlias(ExpositorSelloeditorialPeer::ID_FERIA, $feria->getId(), $comparison);
		} elseif ($feria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ExpositorSelloeditorialPeer::ID_FERIA, $feria->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
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
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterByExpositor($expositor, $comparison = null)
	{
		if ($expositor instanceof Expositor) {
			return $this
				->addUsingAlias(ExpositorSelloeditorialPeer::ID_EXPOSITOR, $expositor->getId(), $comparison);
		} elseif ($expositor instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ExpositorSelloeditorialPeer::ID_EXPOSITOR, $expositor->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
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
	 * Filter the query by a related SelloEditorial object
	 *
	 * @param     SelloEditorial|PropelCollection $selloEditorial The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function filterBySelloEditorial($selloEditorial, $comparison = null)
	{
		if ($selloEditorial instanceof SelloEditorial) {
			return $this
				->addUsingAlias(ExpositorSelloeditorialPeer::ID_SELLO_EDITORIAL, $selloEditorial->getId(), $comparison);
		} elseif ($selloEditorial instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ExpositorSelloeditorialPeer::ID_SELLO_EDITORIAL, $selloEditorial->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySelloEditorial() only accepts arguments of type SelloEditorial or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SelloEditorial relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function joinSelloEditorial($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SelloEditorial');
		
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
			$this->addJoinObject($join, 'SelloEditorial');
		}
		
		return $this;
	}

	/**
	 * Use the SelloEditorial relation SelloEditorial object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SelloEditorialQuery A secondary query class using the current class as primary query
	 */
	public function useSelloEditorialQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSelloEditorial($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SelloEditorial', 'SelloEditorialQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ExpositorSelloeditorial $expositorSelloeditorial Object to remove from the list of results
	 *
	 * @return    ExpositorSelloeditorialQuery The current query, for fluid interface
	 */
	public function prune($expositorSelloeditorial = null)
	{
		if ($expositorSelloeditorial) {
			$this->addUsingAlias(ExpositorSelloeditorialPeer::ID, $expositorSelloeditorial->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseExpositorSelloeditorialQuery
