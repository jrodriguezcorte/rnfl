<?php


/**
 * Base class that represents a query for the 'linea_editorial' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Sat Oct  4 21:39:07 2014
 *
 * @method     LineaEditorialQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LineaEditorialQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     LineaEditorialQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 *
 * @method     LineaEditorialQuery groupById() Group by the id column
 * @method     LineaEditorialQuery groupByNombre() Group by the nombre column
 * @method     LineaEditorialQuery groupByObservaciones() Group by the observaciones column
 *
 * @method     LineaEditorialQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LineaEditorialQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LineaEditorialQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LineaEditorialQuery leftJoinLineaEditorialExposiorFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the LineaEditorialExposiorFeria relation
 * @method     LineaEditorialQuery rightJoinLineaEditorialExposiorFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LineaEditorialExposiorFeria relation
 * @method     LineaEditorialQuery innerJoinLineaEditorialExposiorFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the LineaEditorialExposiorFeria relation
 *
 * @method     LineaEditorial findOne(PropelPDO $con = null) Return the first LineaEditorial matching the query
 * @method     LineaEditorial findOneOrCreate(PropelPDO $con = null) Return the first LineaEditorial matching the query, or a new LineaEditorial object populated from the query conditions when no match is found
 *
 * @method     LineaEditorial findOneById(string $id) Return the first LineaEditorial filtered by the id column
 * @method     LineaEditorial findOneByNombre(string $nombre) Return the first LineaEditorial filtered by the nombre column
 * @method     LineaEditorial findOneByObservaciones(string $observaciones) Return the first LineaEditorial filtered by the observaciones column
 *
 * @method     array findById(string $id) Return LineaEditorial objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return LineaEditorial objects filtered by the nombre column
 * @method     array findByObservaciones(string $observaciones) Return LineaEditorial objects filtered by the observaciones column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseLineaEditorialQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseLineaEditorialQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'LineaEditorial', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LineaEditorialQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LineaEditorialQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LineaEditorialQuery) {
			return $criteria;
		}
		$query = new LineaEditorialQuery();
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
	 * @return    LineaEditorial|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = LineaEditorialPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    LineaEditorialQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LineaEditorialPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LineaEditorialQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LineaEditorialPeer::ID, $keys, Criteria::IN);
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
	 * @return    LineaEditorialQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LineaEditorialPeer::ID, $id, $comparison);
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
	 * @return    LineaEditorialQuery The current query, for fluid interface
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
		return $this->addUsingAlias(LineaEditorialPeer::NOMBRE, $nombre, $comparison);
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
	 * @return    LineaEditorialQuery The current query, for fluid interface
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
		return $this->addUsingAlias(LineaEditorialPeer::OBSERVACIONES, $observaciones, $comparison);
	}

	/**
	 * Filter the query by a related LineaEditorialExposiorFeria object
	 *
	 * @param     LineaEditorialExposiorFeria $lineaEditorialExposiorFeria  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LineaEditorialQuery The current query, for fluid interface
	 */
	public function filterByLineaEditorialExposiorFeria($lineaEditorialExposiorFeria, $comparison = null)
	{
		if ($lineaEditorialExposiorFeria instanceof LineaEditorialExposiorFeria) {
			return $this
				->addUsingAlias(LineaEditorialPeer::ID, $lineaEditorialExposiorFeria->getIdLineaEditorial(), $comparison);
		} elseif ($lineaEditorialExposiorFeria instanceof PropelCollection) {
			return $this
				->useLineaEditorialExposiorFeriaQuery()
					->filterByPrimaryKeys($lineaEditorialExposiorFeria->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLineaEditorialExposiorFeria() only accepts arguments of type LineaEditorialExposiorFeria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the LineaEditorialExposiorFeria relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LineaEditorialQuery The current query, for fluid interface
	 */
	public function joinLineaEditorialExposiorFeria($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('LineaEditorialExposiorFeria');
		
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
			$this->addJoinObject($join, 'LineaEditorialExposiorFeria');
		}
		
		return $this;
	}

	/**
	 * Use the LineaEditorialExposiorFeria relation LineaEditorialExposiorFeria object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LineaEditorialExposiorFeriaQuery A secondary query class using the current class as primary query
	 */
	public function useLineaEditorialExposiorFeriaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinLineaEditorialExposiorFeria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'LineaEditorialExposiorFeria', 'LineaEditorialExposiorFeriaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     LineaEditorial $lineaEditorial Object to remove from the list of results
	 *
	 * @return    LineaEditorialQuery The current query, for fluid interface
	 */
	public function prune($lineaEditorial = null)
	{
		if ($lineaEditorial) {
			$this->addUsingAlias(LineaEditorialPeer::ID, $lineaEditorial->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseLineaEditorialQuery
