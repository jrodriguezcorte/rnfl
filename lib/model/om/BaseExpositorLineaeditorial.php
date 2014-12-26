<?php


/**
 * Base class that represents a row from the 'expositor_lineaeditorial' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Thu Dec 25 22:47:29 2014
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseExpositorLineaeditorial extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ExpositorLineaeditorialPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ExpositorLineaeditorialPeer
	 */
	protected static $peer;

	/**
	 * The value for the id_feria field.
	 * @var        int
	 */
	protected $id_feria;

	/**
	 * The value for the id_expositor field.
	 * @var        int
	 */
	protected $id_expositor;

	/**
	 * The value for the linea_editorial field.
	 * @var        int
	 */
	protected $linea_editorial;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * @var        Feria
	 */
	protected $aFeria;

	/**
	 * @var        Expositor
	 */
	protected $aExpositor;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id_feria] column value.
	 * 
	 * @return     int
	 */
	public function getIdFeria()
	{
		return $this->id_feria;
	}

	/**
	 * Get the [id_expositor] column value.
	 * 
	 * @return     int
	 */
	public function getIdExpositor()
	{
		return $this->id_expositor;
	}

	/**
	 * Get the [linea_editorial] column value.
	 * 
	 * @return     int
	 */
	public function getLineaEditorial()
	{
		return $this->linea_editorial;
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of [id_feria] column.
	 * 
	 * @param      int $v new value
	 * @return     ExpositorLineaeditorial The current object (for fluent API support)
	 */
	public function setIdFeria($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_feria !== $v) {
			$this->id_feria = $v;
			$this->modifiedColumns[] = ExpositorLineaeditorialPeer::ID_FERIA;
		}

		if ($this->aFeria !== null && $this->aFeria->getId() !== $v) {
			$this->aFeria = null;
		}

		return $this;
	} // setIdFeria()

	/**
	 * Set the value of [id_expositor] column.
	 * 
	 * @param      int $v new value
	 * @return     ExpositorLineaeditorial The current object (for fluent API support)
	 */
	public function setIdExpositor($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_expositor !== $v) {
			$this->id_expositor = $v;
			$this->modifiedColumns[] = ExpositorLineaeditorialPeer::ID_EXPOSITOR;
		}

		if ($this->aExpositor !== null && $this->aExpositor->getId() !== $v) {
			$this->aExpositor = null;
		}

		return $this;
	} // setIdExpositor()

	/**
	 * Set the value of [linea_editorial] column.
	 * 
	 * @param      int $v new value
	 * @return     ExpositorLineaeditorial The current object (for fluent API support)
	 */
	public function setLineaEditorial($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->linea_editorial !== $v) {
			$this->linea_editorial = $v;
			$this->modifiedColumns[] = ExpositorLineaeditorialPeer::LINEA_EDITORIAL;
		}

		return $this;
	} // setLineaEditorial()

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      string $v new value
	 * @return     ExpositorLineaeditorial The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ExpositorLineaeditorialPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id_feria = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->id_expositor = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->linea_editorial = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = ExpositorLineaeditorialPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating ExpositorLineaeditorial object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aFeria !== null && $this->id_feria !== $this->aFeria->getId()) {
			$this->aFeria = null;
		}
		if ($this->aExpositor !== null && $this->id_expositor !== $this->aExpositor->getId()) {
			$this->aExpositor = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ExpositorLineaeditorialPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ExpositorLineaeditorialPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aFeria = null;
			$this->aExpositor = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ExpositorLineaeditorialPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseExpositorLineaeditorial:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				ExpositorLineaeditorialQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseExpositorLineaeditorial:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ExpositorLineaeditorialPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseExpositorLineaeditorial:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseExpositorLineaeditorial:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ExpositorLineaeditorialPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aFeria !== null) {
				if ($this->aFeria->isModified() || $this->aFeria->isNew()) {
					$affectedRows += $this->aFeria->save($con);
				}
				$this->setFeria($this->aFeria);
			}

			if ($this->aExpositor !== null) {
				if ($this->aExpositor->isModified() || $this->aExpositor->isNew()) {
					$affectedRows += $this->aExpositor->save($con);
				}
				$this->setExpositor($this->aExpositor);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ExpositorLineaeditorialPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ExpositorLineaeditorialPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ExpositorLineaeditorialPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ExpositorLineaeditorialPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aFeria !== null) {
				if (!$this->aFeria->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFeria->getValidationFailures());
				}
			}

			if ($this->aExpositor !== null) {
				if (!$this->aExpositor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aExpositor->getValidationFailures());
				}
			}


			if (($retval = ExpositorLineaeditorialPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ExpositorLineaeditorialPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdFeria();
				break;
			case 1:
				return $this->getIdExpositor();
				break;
			case 2:
				return $this->getLineaEditorial();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['ExpositorLineaeditorial'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['ExpositorLineaeditorial'][$this->getPrimaryKey()] = true;
		$keys = ExpositorLineaeditorialPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdFeria(),
			$keys[1] => $this->getIdExpositor(),
			$keys[2] => $this->getLineaEditorial(),
			$keys[3] => $this->getId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aFeria) {
				$result['Feria'] = $this->aFeria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aExpositor) {
				$result['Expositor'] = $this->aExpositor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ExpositorLineaeditorialPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdFeria($value);
				break;
			case 1:
				$this->setIdExpositor($value);
				break;
			case 2:
				$this->setLineaEditorial($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ExpositorLineaeditorialPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdFeria($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdExpositor($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLineaEditorial($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ExpositorLineaeditorialPeer::DATABASE_NAME);

		if ($this->isColumnModified(ExpositorLineaeditorialPeer::ID_FERIA)) $criteria->add(ExpositorLineaeditorialPeer::ID_FERIA, $this->id_feria);
		if ($this->isColumnModified(ExpositorLineaeditorialPeer::ID_EXPOSITOR)) $criteria->add(ExpositorLineaeditorialPeer::ID_EXPOSITOR, $this->id_expositor);
		if ($this->isColumnModified(ExpositorLineaeditorialPeer::LINEA_EDITORIAL)) $criteria->add(ExpositorLineaeditorialPeer::LINEA_EDITORIAL, $this->linea_editorial);
		if ($this->isColumnModified(ExpositorLineaeditorialPeer::ID)) $criteria->add(ExpositorLineaeditorialPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ExpositorLineaeditorialPeer::DATABASE_NAME);
		$criteria->add(ExpositorLineaeditorialPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of ExpositorLineaeditorial (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setIdFeria($this->getIdFeria());
		$copyObj->setIdExpositor($this->getIdExpositor());
		$copyObj->setLineaEditorial($this->getLineaEditorial());
		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     ExpositorLineaeditorial Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     ExpositorLineaeditorialPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ExpositorLineaeditorialPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Feria object.
	 *
	 * @param      Feria $v
	 * @return     ExpositorLineaeditorial The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setFeria(Feria $v = null)
	{
		if ($v === null) {
			$this->setIdFeria(NULL);
		} else {
			$this->setIdFeria($v->getId());
		}

		$this->aFeria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Feria object, it will not be re-added.
		if ($v !== null) {
			$v->addExpositorLineaeditorial($this);
		}

		return $this;
	}


	/**
	 * Get the associated Feria object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Feria The associated Feria object.
	 * @throws     PropelException
	 */
	public function getFeria(PropelPDO $con = null)
	{
		if ($this->aFeria === null && ($this->id_feria !== null)) {
			$this->aFeria = FeriaQuery::create()->findPk($this->id_feria, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aFeria->addExpositorLineaeditorials($this);
			 */
		}
		return $this->aFeria;
	}

	/**
	 * Declares an association between this object and a Expositor object.
	 *
	 * @param      Expositor $v
	 * @return     ExpositorLineaeditorial The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setExpositor(Expositor $v = null)
	{
		if ($v === null) {
			$this->setIdExpositor(NULL);
		} else {
			$this->setIdExpositor($v->getId());
		}

		$this->aExpositor = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Expositor object, it will not be re-added.
		if ($v !== null) {
			$v->addExpositorLineaeditorial($this);
		}

		return $this;
	}


	/**
	 * Get the associated Expositor object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Expositor The associated Expositor object.
	 * @throws     PropelException
	 */
	public function getExpositor(PropelPDO $con = null)
	{
		if ($this->aExpositor === null && ($this->id_expositor !== null)) {
			$this->aExpositor = ExpositorQuery::create()->findPk($this->id_expositor, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aExpositor->addExpositorLineaeditorials($this);
			 */
		}
		return $this->aExpositor;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id_feria = null;
		$this->id_expositor = null;
		$this->linea_editorial = null;
		$this->id = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		$this->aFeria = null;
		$this->aExpositor = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ExpositorLineaeditorialPeer::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseExpositorLineaeditorial:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseExpositorLineaeditorial
