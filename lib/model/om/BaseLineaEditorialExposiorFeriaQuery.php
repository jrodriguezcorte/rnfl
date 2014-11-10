<?php


/**
 * Base class that represents a query for the 'linea_editorial_exposior_feria' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Sun Nov  9 16:04:59 2014
 *
 * @method     LineaEditorialExposiorFeriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LineaEditorialExposiorFeriaQuery orderByIdExpositorFeria($order = Criteria::ASC) Order by the id_expositor_feria column
 * @method     LineaEditorialExposiorFeriaQuery orderByIdLineaEditorial($order = Criteria::ASC) Order by the id_linea_editorial column
 *
 * @method     LineaEditorialExposiorFeriaQuery groupById() Group by the id column
 * @method     LineaEditorialExposiorFeriaQuery groupByIdExpositorFeria() Group by the id_expositor_feria column
 * @method     LineaEditorialExposiorFeriaQuery groupByIdLineaEditorial() Group by the id_linea_editorial column
 *
 * @method     LineaEditorialExposiorFeriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LineaEditorialExposiorFeriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LineaEditorialExposiorFeriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LineaEditorialExposiorFeriaQuery leftJoinExpositorFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the ExpositorFeria relation
 * @method     LineaEditorialExposiorFeriaQuery rightJoinExpositorFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ExpositorFeria relation
 * @method     LineaEditorialExposiorFeriaQuery innerJoinExpositorFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the ExpositorFeria relation
 *
 * @method     LineaEditorialExposiorFeriaQuery leftJoinLineaEditorial($relationAlias = null) Adds a LEFT JOIN clause to the query using the LineaEditorial relation
 * @method     LineaEditorialExposiorFeriaQuery rightJoinLineaEditorial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LineaEditorial relation
 * @method     LineaEditorialExposiorFeriaQuery innerJoinLineaEditorial($relationAlias = null) Adds a INNER JOIN clause to the query using the LineaEditorial relation
 *
 * @method     LineaEditorialExposiorFeria findOne(PropelPDO $con = null) Return the first LineaEditorialExposiorFeria matching the query
 * @method     LineaEditorialExposiorFeria findOneOrCreate(PropelPDO $con = null) Return the first LineaEditorialExposiorFeria matching the query, or a new LineaEditorialExposiorFeria object populated from the query conditions when no match is found
 *
 * @method     LineaEditorialExposiorFeria findOneById(string $id) Return the first LineaEditorialExposiorFeria filtered by the id column
 * @method     LineaEditorialExposiorFeria findOneByIdExpositorFeria(int $id_expositor_feria) Return the first LineaEditorialExposiorFeria filtered by the id_expositor_feria column
 * @method     LineaEditorialExposiorFeria findOneByIdLineaEditorial(int $id_linea_editorial) Return the first LineaEditorialExposiorFeria filtered by the id_linea_editorial column
 *
 * @method     array findById(string $id) Return LineaEditorialExposiorFeria objects filtered by the id column
 * @method     array findByIdExpositorFeria(int $id_expositor_feria) Return LineaEditorialExposiorFeria objects filtered by the id_expositor_feria column
 * @method     array findByIdLineaEditorial(int $id_linea_editorial) Return LineaEditorialExposiorFeria objects filtered by the id_linea_editorial column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseLineaEditorialExposiorFeriaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseLineaEditorialExposiorFeriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'LineaEditorialExposiorFeria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LineaEditorialExposiorFeriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LineaEditorialExposiorFeriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LineaEditorialExposiorFeriaQuery) {
			return $criteria;
		}
		$query = new LineaEditorialExposiorFeriaQuery();
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
	 * @return    LineaEditorialExposiorFeria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = LineaEditorialExposiorFeriaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID, $keys, Criteria::IN);
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
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID, $id, $comparison);
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
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function filterByIdExpositorFeria($idExpositorFeria = null, $comparison = null)
	{
		if (is_array($idExpositorFeria)) {
			$useMinMax = false;
			if (isset($idExpositorFeria['min'])) {
				$this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_EXPOSITOR_FERIA, $idExpositorFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idExpositorFeria['max'])) {
				$this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_EXPOSITOR_FERIA, $idExpositorFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_EXPOSITOR_FERIA, $idExpositorFeria, $comparison);
	}

	/**
	 * Filter the query on the id_linea_editorial column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdLineaEditorial(1234); // WHERE id_linea_editorial = 1234
	 * $query->filterByIdLineaEditorial(array(12, 34)); // WHERE id_linea_editorial IN (12, 34)
	 * $query->filterByIdLineaEditorial(array('min' => 12)); // WHERE id_linea_editorial > 12
	 * </code>
	 *
	 * @see       filterByLineaEditorial()
	 *
	 * @param     mixed $idLineaEditorial The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function filterByIdLineaEditorial($idLineaEditorial = null, $comparison = null)
	{
		if (is_array($idLineaEditorial)) {
			$useMinMax = false;
			if (isset($idLineaEditorial['min'])) {
				$this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_LINEA_EDITORIAL, $idLineaEditorial['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idLineaEditorial['max'])) {
				$this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_LINEA_EDITORIAL, $idLineaEditorial['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_LINEA_EDITORIAL, $idLineaEditorial, $comparison);
	}

	/**
	 * Filter the query by a related ExpositorFeria object
	 *
	 * @param     ExpositorFeria|PropelCollection $expositorFeria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function filterByExpositorFeria($expositorFeria, $comparison = null)
	{
		if ($expositorFeria instanceof ExpositorFeria) {
			return $this
				->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_EXPOSITOR_FERIA, $expositorFeria->getId(), $comparison);
		} elseif ($expositorFeria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_EXPOSITOR_FERIA, $expositorFeria->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
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
	 * Filter the query by a related LineaEditorial object
	 *
	 * @param     LineaEditorial|PropelCollection $lineaEditorial The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function filterByLineaEditorial($lineaEditorial, $comparison = null)
	{
		if ($lineaEditorial instanceof LineaEditorial) {
			return $this
				->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_LINEA_EDITORIAL, $lineaEditorial->getId(), $comparison);
		} elseif ($lineaEditorial instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID_LINEA_EDITORIAL, $lineaEditorial->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByLineaEditorial() only accepts arguments of type LineaEditorial or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the LineaEditorial relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function joinLineaEditorial($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('LineaEditorial');
		
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
			$this->addJoinObject($join, 'LineaEditorial');
		}
		
		return $this;
	}

	/**
	 * Use the LineaEditorial relation LineaEditorial object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LineaEditorialQuery A secondary query class using the current class as primary query
	 */
	public function useLineaEditorialQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLineaEditorial($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'LineaEditorial', 'LineaEditorialQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     LineaEditorialExposiorFeria $lineaEditorialExposiorFeria Object to remove from the list of results
	 *
	 * @return    LineaEditorialExposiorFeriaQuery The current query, for fluid interface
	 */
	public function prune($lineaEditorialExposiorFeria = null)
	{
		if ($lineaEditorialExposiorFeria) {
			$this->addUsingAlias(LineaEditorialExposiorFeriaPeer::ID, $lineaEditorialExposiorFeria->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseLineaEditorialExposiorFeriaQuery
