<?php



/**
 * This class defines the structure of the 'stand' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon May 11 16:29:21 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class StandTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.StandTableMap';

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
		$this->setName('stand');
		$this->setPhpName('Stand');
		$this->setClassname('Stand');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('stand_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addForeignKey('ID_FERIA', 'IdFeria', 'INTEGER', 'feria', 'ID', false, null, null);
		$this->addColumn('METROS', 'Metros', 'VARCHAR', false, 255, null);
		$this->addColumn('COSTO_BS', 'CostoBs', 'VARCHAR', false, 255, null);
		$this->addColumn('COSTO_DS', 'CostoDs', 'VARCHAR', false, 255, null);
		$this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, null, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Feria', 'Feria', RelationMap::MANY_TO_ONE, array('id_feria' => 'id', ), 'CASCADE', null);
		$this->addRelation('ExpositorFeria', 'ExpositorFeria', RelationMap::ONE_TO_MANY, array('id' => 'id_stand', ), 'CASCADE', null, 'ExpositorFerias');
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

} // StandTableMap
