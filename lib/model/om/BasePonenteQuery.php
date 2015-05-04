<?php


/**
 * Base class that represents a query for the 'ponente' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Fri May  1 16:52:45 2015
 *
 * @method     PonenteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PonenteQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     PonenteQuery orderByApellido($order = Criteria::ASC) Order by the apellido column
 * @method     PonenteQuery orderByCedula($order = Criteria::ASC) Order by the cedula column
 * @method     PonenteQuery orderByRif($order = Criteria::ASC) Order by the rif column
 * @method     PonenteQuery orderBySexo($order = Criteria::ASC) Order by the sexo column
 * @method     PonenteQuery orderByNacionalidad($order = Criteria::ASC) Order by the nacionalidad column
 * @method     PonenteQuery orderByTelefonoLocal($order = Criteria::ASC) Order by the telefono_local column
 * @method     PonenteQuery orderByTelefonoCelular($order = Criteria::ASC) Order by the telefono_celular column
 * @method     PonenteQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     PonenteQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 *
 * @method     PonenteQuery groupById() Group by the id column
 * @method     PonenteQuery groupByNombre() Group by the nombre column
 * @method     PonenteQuery groupByApellido() Group by the apellido column
 * @method     PonenteQuery groupByCedula() Group by the cedula column
 * @method     PonenteQuery groupByRif() Group by the rif column
 * @method     PonenteQuery groupBySexo() Group by the sexo column
 * @method     PonenteQuery groupByNacionalidad() Group by the nacionalidad column
 * @method     PonenteQuery groupByTelefonoLocal() Group by the telefono_local column
 * @method     PonenteQuery groupByTelefonoCelular() Group by the telefono_celular column
 * @method     PonenteQuery groupByEmail() Group by the email column
 * @method     PonenteQuery groupByObservaciones() Group by the observaciones column
 *
 * @method     PonenteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PonenteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PonenteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PonenteQuery leftJoinPais($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pais relation
 * @method     PonenteQuery rightJoinPais($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pais relation
 * @method     PonenteQuery innerJoinPais($relationAlias = null) Adds a INNER JOIN clause to the query using the Pais relation
 *
 * @method     PonenteQuery leftJoinPonenteActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the PonenteActividad relation
 * @method     PonenteQuery rightJoinPonenteActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PonenteActividad relation
 * @method     PonenteQuery innerJoinPonenteActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the PonenteActividad relation
 *
 * @method     Ponente findOne(PropelPDO $con = null) Return the first Ponente matching the query
 * @method     Ponente findOneOrCreate(PropelPDO $con = null) Return the first Ponente matching the query, or a new Ponente object populated from the query conditions when no match is found
 *
 * @method     Ponente findOneById(string $id) Return the first Ponente filtered by the id column
 * @method     Ponente findOneByNombre(string $nombre) Return the first Ponente filtered by the nombre column
 * @method     Ponente findOneByApellido(string $apellido) Return the first Ponente filtered by the apellido column
 * @method     Ponente findOneByCedula(string $cedula) Return the first Ponente filtered by the cedula column
 * @method     Ponente findOneByRif(string $rif) Return the first Ponente filtered by the rif column
 * @method     Ponente findOneBySexo(string $sexo) Return the first Ponente filtered by the sexo column
 * @method     Ponente findOneByNacionalidad(int $nacionalidad) Return the first Ponente filtered by the nacionalidad column
 * @method     Ponente findOneByTelefonoLocal(string $telefono_local) Return the first Ponente filtered by the telefono_local column
 * @method     Ponente findOneByTelefonoCelular(string $telefono_celular) Return the first Ponente filtered by the telefono_celular column
 * @method     Ponente findOneByEmail(string $email) Return the first Ponente filtered by the email column
 * @method     Ponente findOneByObservaciones(string $observaciones) Return the first Ponente filtered by the observaciones column
 *
 * @method     array findById(string $id) Return Ponente objects filtered by the id column
 * @method     array findByNombre(string $nombre) Return Ponente objects filtered by the nombre column
 * @method     array findByApellido(string $apellido) Return Ponente objects filtered by the apellido column
 * @method     array findByCedula(string $cedula) Return Ponente objects filtered by the cedula column
 * @method     array findByRif(string $rif) Return Ponente objects filtered by the rif column
 * @method     array findBySexo(string $sexo) Return Ponente objects filtered by the sexo column
 * @method     array findByNacionalidad(int $nacionalidad) Return Ponente objects filtered by the nacionalidad column
 * @method     array findByTelefonoLocal(string $telefono_local) Return Ponente objects filtered by the telefono_local column
 * @method     array findByTelefonoCelular(string $telefono_celular) Return Ponente objects filtered by the telefono_celular column
 * @method     array findByEmail(string $email) Return Ponente objects filtered by the email column
 * @method     array findByObservaciones(string $observaciones) Return Ponente objects filtered by the observaciones column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePonenteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePonenteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Ponente', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PonenteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PonenteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PonenteQuery) {
			return $criteria;
		}
		$query = new PonenteQuery();
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
	 * @return    Ponente|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PonentePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PonentePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PonentePeer::ID, $keys, Criteria::IN);
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
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PonentePeer::ID, $id, $comparison);
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
	 * @return    PonenteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PonentePeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the apellido column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByApellido('fooValue');   // WHERE apellido = 'fooValue'
	 * $query->filterByApellido('%fooValue%'); // WHERE apellido LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $apellido The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByApellido($apellido = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($apellido)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $apellido)) {
				$apellido = str_replace('*', '%', $apellido);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::APELLIDO, $apellido, $comparison);
	}

	/**
	 * Filter the query on the cedula column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCedula('fooValue');   // WHERE cedula = 'fooValue'
	 * $query->filterByCedula('%fooValue%'); // WHERE cedula LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cedula The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByCedula($cedula = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cedula)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cedula)) {
				$cedula = str_replace('*', '%', $cedula);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::CEDULA, $cedula, $comparison);
	}

	/**
	 * Filter the query on the rif column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByRif('fooValue');   // WHERE rif = 'fooValue'
	 * $query->filterByRif('%fooValue%'); // WHERE rif LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $rif The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByRif($rif = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($rif)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $rif)) {
				$rif = str_replace('*', '%', $rif);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::RIF, $rif, $comparison);
	}

	/**
	 * Filter the query on the sexo column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterBySexo('fooValue');   // WHERE sexo = 'fooValue'
	 * $query->filterBySexo('%fooValue%'); // WHERE sexo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sexo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterBySexo($sexo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sexo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sexo)) {
				$sexo = str_replace('*', '%', $sexo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::SEXO, $sexo, $comparison);
	}

	/**
	 * Filter the query on the nacionalidad column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByNacionalidad(1234); // WHERE nacionalidad = 1234
	 * $query->filterByNacionalidad(array(12, 34)); // WHERE nacionalidad IN (12, 34)
	 * $query->filterByNacionalidad(array('min' => 12)); // WHERE nacionalidad > 12
	 * </code>
	 *
	 * @see       filterByPais()
	 *
	 * @param     mixed $nacionalidad The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByNacionalidad($nacionalidad = null, $comparison = null)
	{
		if (is_array($nacionalidad)) {
			$useMinMax = false;
			if (isset($nacionalidad['min'])) {
				$this->addUsingAlias(PonentePeer::NACIONALIDAD, $nacionalidad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($nacionalidad['max'])) {
				$this->addUsingAlias(PonentePeer::NACIONALIDAD, $nacionalidad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PonentePeer::NACIONALIDAD, $nacionalidad, $comparison);
	}

	/**
	 * Filter the query on the telefono_local column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByTelefonoLocal('fooValue');   // WHERE telefono_local = 'fooValue'
	 * $query->filterByTelefonoLocal('%fooValue%'); // WHERE telefono_local LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telefonoLocal The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByTelefonoLocal($telefonoLocal = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefonoLocal)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefonoLocal)) {
				$telefonoLocal = str_replace('*', '%', $telefonoLocal);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::TELEFONO_LOCAL, $telefonoLocal, $comparison);
	}

	/**
	 * Filter the query on the telefono_celular column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByTelefonoCelular('fooValue');   // WHERE telefono_celular = 'fooValue'
	 * $query->filterByTelefonoCelular('%fooValue%'); // WHERE telefono_celular LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telefonoCelular The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByTelefonoCelular($telefonoCelular = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefonoCelular)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefonoCelular)) {
				$telefonoCelular = str_replace('*', '%', $telefonoCelular);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::TELEFONO_CELULAR, $telefonoCelular, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
	 * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $email The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::EMAIL, $email, $comparison);
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
	 * @return    PonenteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PonentePeer::OBSERVACIONES, $observaciones, $comparison);
	}

	/**
	 * Filter the query by a related Pais object
	 *
	 * @param     Pais|PropelCollection $pais The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByPais($pais, $comparison = null)
	{
		if ($pais instanceof Pais) {
			return $this
				->addUsingAlias(PonentePeer::NACIONALIDAD, $pais->getId(), $comparison);
		} elseif ($pais instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PonentePeer::NACIONALIDAD, $pais->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PonenteQuery The current query, for fluid interface
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
	 * Filter the query by a related PonenteActividad object
	 *
	 * @param     PonenteActividad $ponenteActividad  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByPonenteActividad($ponenteActividad, $comparison = null)
	{
		if ($ponenteActividad instanceof PonenteActividad) {
			return $this
				->addUsingAlias(PonentePeer::ID, $ponenteActividad->getIdPonente(), $comparison);
		} elseif ($ponenteActividad instanceof PropelCollection) {
			return $this
				->usePonenteActividadQuery()
					->filterByPrimaryKeys($ponenteActividad->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPonenteActividad() only accepts arguments of type PonenteActividad or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PonenteActividad relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function joinPonenteActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PonenteActividad');
		
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
			$this->addJoinObject($join, 'PonenteActividad');
		}
		
		return $this;
	}

	/**
	 * Use the PonenteActividad relation PonenteActividad object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteActividadQuery A secondary query class using the current class as primary query
	 */
	public function usePonenteActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPonenteActividad($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PonenteActividad', 'PonenteActividadQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Ponente $ponente Object to remove from the list of results
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function prune($ponente = null)
	{
		if ($ponente) {
			$this->addUsingAlias(PonentePeer::ID, $ponente->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePonenteQuery
