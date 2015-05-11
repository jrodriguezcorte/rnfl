<?php


/**
 * Base class that represents a query for the 'moneda' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon May 11 16:29:20 2015
 *
 * @method     MonedaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MonedaQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     MonedaQuery orderBySimbolo($order = Criteria::ASC) Order by the simbolo column
 *
 * @method     MonedaQuery groupById() Group by the id column
 * @method     MonedaQuery groupByNombre() Group by the nombre column
 * @method     MonedaQuery groupBySimbolo() Group by the simbolo column
 *
 * @method     MonedaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MonedaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MonedaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MonedaQuery leftJoinBanco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Banco relation
 * @method     MonedaQuery rightJoinBanco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Banco relation
 * @method     MonedaQuery innerJoinBanco($relationAlias = null) Adds a INNER JOIN clause to the query using the Banco relation
 *
 * @method     Moneda findOne(PropelPDO $con = null) Return the first Moneda matching the query
 * @method     Moneda findOneOrCreate(PropelPDO $con = null) Return the first Moneda matching the query, or a new Moneda object populated from the query conditions when no match is found
 *
 * @method     Moneda findOneById(string $id) Return the first Moneda filtered by the id column
 * @method     Moneda findOneByNombre(string $nombre) Return the first Moneda filtered by the nombre column
 * @method     Moneda findOneBySimbolo(string $simbolo) Return the first Moneda filtered by the simbolo column
 *
 * @method     array findById(string $id) Return Moneda objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Moneda objects filtered by the nombre column
 * @method     array findBySimbolo(string $simbolo) Return Moneda objects filtered by the simbolo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseMonedaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMonedaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Moneda', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MonedaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MonedaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MonedaQuery) {
			return $criteria;
		}
		$query = new MonedaQuery();
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
	 * @return    Moneda|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MonedaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MonedaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MonedaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MonedaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MonedaPeer::ID, $keys, Criteria::IN);
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
	 * @return    MonedaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MonedaPeer::ID, $id, $comparison);
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
	 * @return    MonedaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MonedaPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the simbolo column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterBySimbolo('fooValue');   // WHERE simbolo = 'fooValue'
	 * $query->filterBySimbolo('%fooValue%'); // WHERE simbolo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $simbolo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MonedaQuery The current query, for fluid interface
	 */
	public function filterBySimbolo($simbolo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($simbolo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $simbolo)) {
				$simbolo = str_replace('*', '%', $simbolo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MonedaPeer::SIMBOLO, $simbolo, $comparison);
	}

	/**
	 * Filter the query by a related Banco object
	 *
	 * @param     Banco $banco  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MonedaQuery The current query, for fluid interface
	 */
	public function filterByBanco($banco, $comparison = null)
	{
		if ($banco instanceof Banco) {
			return $this
				->addUsingAlias(MonedaPeer::ID, $banco->getIdMoneda(), $comparison);
		} elseif ($banco instanceof PropelCollection) {
			return $this
				->useBancoQuery()
					->filterByPrimaryKeys($banco->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByBanco() only accepts arguments of type Banco or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Banco relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MonedaQuery The current query, for fluid interface
	 */
	public function joinBanco($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Banco');
		
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
			$this->addJoinObject($join, 'Banco');
		}
		
		return $this;
	}

	/**
	 * Use the Banco relation Banco object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BancoQuery A secondary query class using the current class as primary query
	 */
	public function useBancoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinBanco($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Banco', 'BancoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Moneda $moneda Object to remove from the list of results
	 *
	 * @return    MonedaQuery The current query, for fluid interface
	 */
	public function prune($moneda = null)
	{
		if ($moneda) {
			$this->addUsingAlias(MonedaPeer::ID, $moneda->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMonedaQuery
