<?php


/**
 * Base class that represents a query for the 'cuenta' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Sun Feb 22 12:26:14 2015
 *
 * @method     CuentaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CuentaQuery orderByIdBanco($order = Criteria::ASC) Order by the id_banco column
 * @method     CuentaQuery orderBySwift($order = Criteria::ASC) Order by the swift column
 * @method     CuentaQuery orderByAba($order = Criteria::ASC) Order by the aba column
 * @method     CuentaQuery orderByBeneficiario($order = Criteria::ASC) Order by the beneficiario column
 * @method     CuentaQuery orderByIdFeria($order = Criteria::ASC) Order by the id_feria column
 * @method     CuentaQuery orderByNumero($order = Criteria::ASC) Order by the numero column
 *
 * @method     CuentaQuery groupById() Group by the id column
 * @method     CuentaQuery groupByIdBanco() Group by the id_banco column
 * @method     CuentaQuery groupBySwift() Group by the swift column
 * @method     CuentaQuery groupByAba() Group by the aba column
 * @method     CuentaQuery groupByBeneficiario() Group by the beneficiario column
 * @method     CuentaQuery groupByIdFeria() Group by the id_feria column
 * @method     CuentaQuery groupByNumero() Group by the numero column
 *
 * @method     CuentaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CuentaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CuentaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CuentaQuery leftJoinBanco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Banco relation
 * @method     CuentaQuery rightJoinBanco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Banco relation
 * @method     CuentaQuery innerJoinBanco($relationAlias = null) Adds a INNER JOIN clause to the query using the Banco relation
 *
 * @method     CuentaQuery leftJoinFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feria relation
 * @method     CuentaQuery rightJoinFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feria relation
 * @method     CuentaQuery innerJoinFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the Feria relation
 *
 * @method     Cuenta findOne(PropelPDO $con = null) Return the first Cuenta matching the query
 * @method     Cuenta findOneOrCreate(PropelPDO $con = null) Return the first Cuenta matching the query, or a new Cuenta object populated from the query conditions when no match is found
 *
 * @method     Cuenta findOneById(string $id) Return the first Cuenta filtered by the id column
 * @method     Cuenta findOneByIdBanco(int $id_banco) Return the first Cuenta filtered by the id_banco column
 * @method     Cuenta findOneBySwift(string $swift) Return the first Cuenta filtered by the swift column
 * @method     Cuenta findOneByAba(string $aba) Return the first Cuenta filtered by the aba column
 * @method     Cuenta findOneByBeneficiario(string $beneficiario) Return the first Cuenta filtered by the beneficiario column
 * @method     Cuenta findOneByIdFeria(int $id_feria) Return the first Cuenta filtered by the id_feria column
 * @method     Cuenta findOneByNumero(string $numero) Return the first Cuenta filtered by the numero column
 *
 * @method     array findById(string $id) Return Cuenta objects filtered by the id column
 * @method     array findByIdBanco(int $id_banco) Return Cuenta objects filtered by the id_banco column
 * @method     array findBySwift(string $swift) Return Cuenta objects filtered by the swift column
 * @method     array findByAba(string $aba) Return Cuenta objects filtered by the aba column
 * @method     array findByBeneficiario(string $beneficiario) Return Cuenta objects filtered by the beneficiario column
 * @method     array findByIdFeria(int $id_feria) Return Cuenta objects filtered by the id_feria column
 * @method     array findByNumero(string $numero) Return Cuenta objects filtered by the numero column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseCuentaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCuentaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Cuenta', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CuentaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CuentaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CuentaQuery) {
			return $criteria;
		}
		$query = new CuentaQuery();
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
	 * @return    Cuenta|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CuentaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CuentaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CuentaPeer::ID, $keys, Criteria::IN);
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
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CuentaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_banco column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByIdBanco(1234); // WHERE id_banco = 1234
	 * $query->filterByIdBanco(array(12, 34)); // WHERE id_banco IN (12, 34)
	 * $query->filterByIdBanco(array('min' => 12)); // WHERE id_banco > 12
	 * </code>
	 *
	 * @see       filterByBanco()
	 *
	 * @param     mixed $idBanco The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByIdBanco($idBanco = null, $comparison = null)
	{
		if (is_array($idBanco)) {
			$useMinMax = false;
			if (isset($idBanco['min'])) {
				$this->addUsingAlias(CuentaPeer::ID_BANCO, $idBanco['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idBanco['max'])) {
				$this->addUsingAlias(CuentaPeer::ID_BANCO, $idBanco['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CuentaPeer::ID_BANCO, $idBanco, $comparison);
	}

	/**
	 * Filter the query on the swift column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterBySwift('fooValue');   // WHERE swift = 'fooValue'
	 * $query->filterBySwift('%fooValue%'); // WHERE swift LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $swift The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterBySwift($swift = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($swift)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $swift)) {
				$swift = str_replace('*', '%', $swift);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CuentaPeer::SWIFT, $swift, $comparison);
	}

	/**
	 * Filter the query on the aba column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByAba('fooValue');   // WHERE aba = 'fooValue'
	 * $query->filterByAba('%fooValue%'); // WHERE aba LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $aba The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByAba($aba = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($aba)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $aba)) {
				$aba = str_replace('*', '%', $aba);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CuentaPeer::ABA, $aba, $comparison);
	}

	/**
	 * Filter the query on the beneficiario column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByBeneficiario('fooValue');   // WHERE beneficiario = 'fooValue'
	 * $query->filterByBeneficiario('%fooValue%'); // WHERE beneficiario LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $beneficiario The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByBeneficiario($beneficiario = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($beneficiario)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $beneficiario)) {
				$beneficiario = str_replace('*', '%', $beneficiario);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CuentaPeer::BENEFICIARIO, $beneficiario, $comparison);
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
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByIdFeria($idFeria = null, $comparison = null)
	{
		if (is_array($idFeria)) {
			$useMinMax = false;
			if (isset($idFeria['min'])) {
				$this->addUsingAlias(CuentaPeer::ID_FERIA, $idFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idFeria['max'])) {
				$this->addUsingAlias(CuentaPeer::ID_FERIA, $idFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CuentaPeer::ID_FERIA, $idFeria, $comparison);
	}

	/**
	 * Filter the query on the numero column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByNumero('fooValue');   // WHERE numero = 'fooValue'
	 * $query->filterByNumero('%fooValue%'); // WHERE numero LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $numero The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByNumero($numero = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($numero)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $numero)) {
				$numero = str_replace('*', '%', $numero);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CuentaPeer::NUMERO, $numero, $comparison);
	}

	/**
	 * Filter the query by a related Banco object
	 *
	 * @param     Banco|PropelCollection $banco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByBanco($banco, $comparison = null)
	{
		if ($banco instanceof Banco) {
			return $this
				->addUsingAlias(CuentaPeer::ID_BANCO, $banco->getId(), $comparison);
		} elseif ($banco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CuentaPeer::ID_BANCO, $banco->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CuentaQuery The current query, for fluid interface
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
	 * Filter the query by a related Feria object
	 *
	 * @param     Feria|PropelCollection $feria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function filterByFeria($feria, $comparison = null)
	{
		if ($feria instanceof Feria) {
			return $this
				->addUsingAlias(CuentaPeer::ID_FERIA, $feria->getId(), $comparison);
		} elseif ($feria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CuentaPeer::ID_FERIA, $feria->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CuentaQuery The current query, for fluid interface
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
	 * @param     Cuenta $cuenta Object to remove from the list of results
	 *
	 * @return    CuentaQuery The current query, for fluid interface
	 */
	public function prune($cuenta = null)
	{
		if ($cuenta) {
			$this->addUsingAlias(CuentaPeer::ID, $cuenta->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCuentaQuery
