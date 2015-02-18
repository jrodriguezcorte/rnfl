<?php



/**
 * This class defines the structure of the 'status' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Tue Feb 17 18:35:37 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class StatusTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.StatusTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('status');
		$this->setPhpName('Status');
		$this->setClassname('Status');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('status_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addForeignKey('ID_FERIA', 'IdFeria', 'INTEGER', 'feria', 'ID', false, null, null);
		$this->addForeignKey('ID_EXPOSITOR', 'IdExpositor', 'INTEGER', 'expositor', 'ID', false, null, null);
		$this->addForeignKey('ID_STATUS', 'IdStatus', 'INTEGER', 'tipo_status', 'ID', false, null, null);
		$this->addColumn('OBSERVACIONES', 'Observaciones', 'VARCHAR', false, 255, null);
		$this->addColumn('FECHA', 'Fecha', 'DATE', false, null, 'now()');
		$this->addForeignKey('ID_EXPOSITOR_FERIA', 'IdExpositorFeria', 'INTEGER', 'expositor_feria', 'ID', false, null, null);
		$this->addColumn('STATUS_ACTUAL', 'StatusActual', 'BOOLEAN', false, null, null);
		$this->addForeignKey('ID_PAGO_EXPOSITOR', 'IdPagoExpositor', 'INTEGER', 'pago_expositor', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Feria', 'Feria', RelationMap::MANY_TO_ONE, array('id_feria' => 'id', ), null, null);
		$this->addRelation('Expositor', 'Expositor', RelationMap::MANY_TO_ONE, array('id_expositor' => 'id', ), null, null);
		$this->addRelation('TipoStatus', 'TipoStatus', RelationMap::MANY_TO_ONE, array('id_status' => 'id', ), null, null);
		$this->addRelation('ExpositorFeria', 'ExpositorFeria', RelationMap::MANY_TO_ONE, array('id_expositor_feria' => 'id', ), null, null);
		$this->addRelation('PagoExpositor', 'PagoExpositor', RelationMap::MANY_TO_ONE, array('id_pago_expositor' => 'id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // StatusTableMap
