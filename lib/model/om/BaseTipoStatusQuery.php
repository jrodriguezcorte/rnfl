<?php


/**
 * Base class that represents a query for the 'tipo_status' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon May 11 16:29:21 2015
 *
 * @method     TipoStatusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TipoStatusQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 *
 * @method     TipoStatusQuery groupById() Group by the id column
 * @method     TipoStatusQuery groupByNombre() Group by the nombre column
 *
 * @method     TipoStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TipoStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TipoStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TipoStatusQuery leftJoinStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the Status relation
 * @method     TipoStatusQuery rightJoinStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Status relation
 * @method     TipoStatusQuery innerJoinStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the Status relation
 *
 * @method     TipoStatus findOne(PropelPDO $con = null) Return the first TipoStatus matching the query
 * @method     TipoStatus findOneOrCreate(PropelPDO $con = null) Return the first TipoStatus matching the query, or a new TipoStatus object populated from the query conditions when no match is found
 *
 * @method     TipoStatus findOneById(string $id) Return the first TipoStatus filtered by the id column
 * @method     TipoStatus findOneByNombre(string $nombre) Return the first TipoStatus filtered by the nombre column
 *
 * @method     array findById(string $id) Return TipoStatus objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return TipoStatus objects filtered by the nombre column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTipoStatusQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTipoStatusQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TipoStatus', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TipoStatusQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TipoStatusQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TipoStatusQuery) {
			return $criteria;
		}
		$query = new TipoStatusQuery();
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
	 * @return    TipoStatus|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TipoStatusPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TipoStatusQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TipoStatusPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TipoStatusQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TipoStatusPeer::ID, $keys, Criteria::IN);
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
	 * @return    TipoStatusQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TipoStatusPeer::ID, $id, $comparison);
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
	 * @return    TipoStatusQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TipoStatusPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query by a related Status object
	 *
	 * @param     Status $status  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoStatusQuery The current query, for fluid interface
	 */
	public function filterByStatus($status, $comparison = null)
	{
		if ($status instanceof Status) {
			return $this
				->addUsingAlias(TipoStatusPeer::ID, $status->getIdStatus(), $comparison);
		} elseif ($status instanceof PropelCollection) {
			return $this
				->useStatusQuery()
					->filterByPrimaryKeys($status->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByStatus() only accepts arguments of type Status or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Status relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TipoStatusQuery The current query, for fluid interface
	 */
	public function joinStatus($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Status');
		
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
			$this->addJoinObject($join, 'Status');
		}
		
		return $this;
	}

	/**
	 * Use the Status relation Status object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    StatusQuery A secondary query class using the current class as primary query
	 */
	public function useStatusQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinStatus($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Status', 'StatusQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TipoStatus $tipoStatus Object to remove from the list of results
	 *
	 * @return    TipoStatusQuery The current query, for fluid interface
	 */
	public function prune($tipoStatus = null)
	{
		if ($tipoStatus) {
			$this->addUsingAlias(TipoStatusPeer::ID, $tipoStatus->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseTipoStatusQuery
