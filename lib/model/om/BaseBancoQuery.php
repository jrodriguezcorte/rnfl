<?php


/**
 * Base class that represents a query for the 'banco' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon May 11 16:29:19 2015
 *
 * @method     BancoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BancoQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     BancoQuery orderByEsNacional($order = Criteria::ASC) Order by the es_nacional column
 * @method     BancoQuery orderByIdFeria($order = Criteria::ASC) Order by the id_feria column
 * @method     BancoQuery orderByIdPais($order = Criteria::ASC) Order by the id_pais column
 * @method     BancoQuery orderByIdMoneda($order = Criteria::ASC) Order by the id_moneda column
 *
 * @method     BancoQuery groupById() Group by the id column
 * @method     BancoQuery groupByNombre() Group by the nombre column
 * @method     BancoQuery groupByEsNacional() Group by the es_nacional column
 * @method     BancoQuery groupByIdFeria() Group by the id_feria column
 * @method     BancoQuery groupByIdPais() Group by the id_pais column
 * @method     BancoQuery groupByIdMoneda() Group by the id_moneda column
 *
 * @method     BancoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BancoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BancoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     BancoQuery leftJoinFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feria relation
 * @method     BancoQuery rightJoinFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feria relation
 * @method     BancoQuery innerJoinFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the Feria relation
 *
 * @method     BancoQuery leftJoinPais($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pais relation
 * @method     BancoQuery rightJoinPais($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pais relation
 * @method     BancoQuery innerJoinPais($relationAlias = null) Adds a INNER JOIN clause to the query using the Pais relation
 *
 * @method     BancoQuery leftJoinMoneda($relationAlias = null) Adds a LEFT JOIN clause to the query using the Moneda relation
 * @method     BancoQuery rightJoinMoneda($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Moneda relation
 * @method     BancoQuery innerJoinMoneda($relationAlias = null) Adds a INNER JOIN clause to the query using the Moneda relation
 *
 * @method     BancoQuery leftJoinCuenta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cuenta relation
 * @method     BancoQuery rightJoinCuenta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cuenta relation
 * @method     BancoQuery innerJoinCuenta($relationAlias = null) Adds a INNER JOIN clause to the query using the Cuenta relation
 *
 * @method     BancoQuery leftJoinPagoExpositor($relationAlias = null) Adds a LEFT JOIN clause to the query using the PagoExpositor relation
 * @method     BancoQuery rightJoinPagoExpositor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PagoExpositor relation
 * @method     BancoQuery innerJoinPagoExpositor($relationAlias = null) Adds a INNER JOIN clause to the query using the PagoExpositor relation
 *
 * @method     Banco findOne(PropelPDO $con = null) Return the first Banco matching the query
 * @method     Banco findOneOrCreate(PropelPDO $con = null) Return the first Banco matching the query, or a new Banco object populated from the query conditions when no match is found
 *
 * @method     Banco findOneById(string $id) Return the first Banco filtered by the id column
 * @method     Banco findOneByNombre(string $nombre) Return the first Banco filtered by the nombre column
 * @method     Banco findOneByEsNacional(boolean $es_nacional) Return the first Banco filtered by the es_nacional column
 * @method     Banco findOneByIdFeria(int $id_feria) Return the first Banco filtered by the id_feria column
 * @method     Banco findOneByIdPais(int $id_pais) Return the first Banco filtered by the id_pais column
 * @method     Banco findOneByIdMoneda(int $id_moneda) Return the first Banco filtered by the id_moneda column
 *
 * @method     array findById(string $id) Return Banco objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Banco objects filtered by the nombre column
 * @method     array findByEsNacional(boolean $es_nacional) Return Banco objects filtered by the es_nacional column
 * @method     array findByIdFeria(int $id_feria) Return Banco objects filtered by the id_feria column
 * @method     array findByIdPais(int $id_pais) Return Banco objects filtered by the id_pais column
 * @method     array findByIdMoneda(int $id_moneda) Return Banco objects filtered by the id_moneda column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseBancoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBancoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Banco', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BancoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BancoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BancoQuery) {
			return $criteria;
		}
		$query = new BancoQuery();
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
	 * @return    Banco|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BancoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BancoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BancoPeer::ID, $keys, Criteria::IN);
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
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BancoPeer::ID, $id, $comparison);
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
	 * @return    BancoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(BancoPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the es_nacional column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEsNacional(true); // WHERE es_nacional = true
	 * $query->filterByEsNacional('yes'); // WHERE es_nacional = true
	 * </code>
	 *
	 * @param     boolean|string $esNacional The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByEsNacional($esNacional = null, $comparison = null)
	{
		if (is_string($esNacional)) {
			$es_nacional = in_array(strtolower($esNacional), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(BancoPeer::ES_NACIONAL, $esNacional, $comparison);
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
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByIdFeria($idFeria = null, $comparison = null)
	{
		if (is_array($idFeria)) {
			$useMinMax = false;
			if (isset($idFeria['min'])) {
				$this->addUsingAlias(BancoPeer::ID_FERIA, $idFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idFeria['max'])) {
				$this->addUsingAlias(BancoPeer::ID_FERIA, $idFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BancoPeer::ID_FERIA, $idFeria, $comparison);
	}

	/**
	 * Filter the query on the id_pais column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdPais(1234); // WHERE id_pais = 1234
	 * $query->filterByIdPais(array(12, 34)); // WHERE id_pais IN (12, 34)
	 * $query->filterByIdPais(array('min' => 12)); // WHERE id_pais > 12
	 * </code>
	 *
	 * @see       filterByPais()
	 *
	 * @param     mixed $idPais The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByIdPais($idPais = null, $comparison = null)
	{
		if (is_array($idPais)) {
			$useMinMax = false;
			if (isset($idPais['min'])) {
				$this->addUsingAlias(BancoPeer::ID_PAIS, $idPais['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idPais['max'])) {
				$this->addUsingAlias(BancoPeer::ID_PAIS, $idPais['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BancoPeer::ID_PAIS, $idPais, $comparison);
	}

	/**
	 * Filter the query on the id_moneda column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdMoneda(1234); // WHERE id_moneda = 1234
	 * $query->filterByIdMoneda(array(12, 34)); // WHERE id_moneda IN (12, 34)
	 * $query->filterByIdMoneda(array('min' => 12)); // WHERE id_moneda > 12
	 * </code>
	 *
	 * @see       filterByMoneda()
	 *
	 * @param     mixed $idMoneda The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByIdMoneda($idMoneda = null, $comparison = null)
	{
		if (is_array($idMoneda)) {
			$useMinMax = false;
			if (isset($idMoneda['min'])) {
				$this->addUsingAlias(BancoPeer::ID_MONEDA, $idMoneda['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idMoneda['max'])) {
				$this->addUsingAlias(BancoPeer::ID_MONEDA, $idMoneda['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BancoPeer::ID_MONEDA, $idMoneda, $comparison);
	}

	/**
	 * Filter the query by a related Feria object
	 *
	 * @param     Feria|PropelCollection $feria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByFeria($feria, $comparison = null)
	{
		if ($feria instanceof Feria) {
			return $this
				->addUsingAlias(BancoPeer::ID_FERIA, $feria->getId(), $comparison);
		} elseif ($feria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(BancoPeer::ID_FERIA, $feria->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    BancoQuery The current query, for fluid interface
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
	 * Filter the query by a related Pais object
	 *
	 * @param     Pais|PropelCollection $pais The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByPais($pais, $comparison = null)
	{
		if ($pais instanceof Pais) {
			return $this
				->addUsingAlias(BancoPeer::ID_PAIS, $pais->getId(), $comparison);
		} elseif ($pais instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(BancoPeer::ID_PAIS, $pais->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPais() only accepts arguments of type Pais or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Pais relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function joinPais($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pais');
		
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
			$this->addJoinObject($join, 'Pais');
		}
		
		return $this;
	}

	/**
	 * Use the Pais relation Pais object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PaisQuery A secondary query class using the current class as primary query
	 */
	public function usePaisQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPais($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pais', 'PaisQuery');
	}

	/**
	 * Filter the query by a related Moneda object
	 *
	 * @param     Moneda|PropelCollection $moneda The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByMoneda($moneda, $comparison = null)
	{
		if ($moneda instanceof Moneda) {
			return $this
				->addUsingAlias(BancoPeer::ID_MONEDA, $moneda->getId(), $comparison);
		} elseif ($moneda instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(BancoPeer::ID_MONEDA, $moneda->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function joinMoneda($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
		if($relationAlias) {
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
	 * @return    MonedaQuery A secondary query class using the current class as primary query
	 */
	public function useMonedaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMoneda($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Moneda', 'MonedaQuery');
	}

	/**
	 * Filter the query by a related Cuenta object
	 *
	 * @param     Cuenta $cuenta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByCuenta($cuenta, $comparison = null)
	{
		if ($cuenta instanceof Cuenta) {
			return $this
				->addUsingAlias(BancoPeer::ID, $cuenta->getIdBanco(), $comparison);
		} elseif ($cuenta instanceof PropelCollection) {
			return $this
				->useCuentaQuery()
					->filterByPrimaryKeys($cuenta->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCuenta() only accepts arguments of type Cuenta or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cuenta relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function joinCuenta($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cuenta');
		
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
			$this->addJoinObject($join, 'Cuenta');
		}
		
		return $this;
	}

	/**
	 * Use the Cuenta relation Cuenta object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CuentaQuery A secondary query class using the current class as primary query
	 */
	public function useCuentaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCuenta($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cuenta', 'CuentaQuery');
	}

	/**
	 * Filter the query by a related PagoExpositor object
	 *
	 * @param     PagoExpositor $pagoExpositor  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function filterByPagoExpositor($pagoExpositor, $comparison = null)
	{
		if ($pagoExpositor instanceof PagoExpositor) {
			return $this
				->addUsingAlias(BancoPeer::ID, $pagoExpositor->getIdBanco(), $comparison);
		} elseif ($pagoExpositor instanceof PropelCollection) {
			return $this
				->usePagoExpositorQuery()
					->filterByPrimaryKeys($pagoExpositor->getPrimaryKeys())
				->endUse();
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
	 * @return    BancoQuery The current query, for fluid interface
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
	 * @param     Banco $banco Object to remove from the list of results
	 *
	 * @return    BancoQuery The current query, for fluid interface
	 */
	public function prune($banco = null)
	{
		if ($banco) {
			$this->addUsingAlias(BancoPeer::ID, $banco->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseBancoQuery
