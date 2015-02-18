<?php



/**
 * This class defines the structure of the 'expositor_lineaeditorial' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Tue Feb 17 18:35:36 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ExpositorLineaeditorialTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ExpositorLineaeditorialTableMap';

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
		$this->setName('expositor_lineaeditorial');
		$this->setPhpName('ExpositorLineaeditorial');
		$this->setClassname('ExpositorLineaeditorial');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('expositor_lineaeditorial_id_seq');
		// columns
		$this->addForeignKey('ID_FERIA', 'IdFeria', 'INTEGER', 'feria', 'ID', false, null, null);
		$this->addForeignKey('ID_EXPOSITOR', 'IdExpositor', 'INTEGER', 'expositor', 'ID', false, null, null);
		$this->addColumn('LINEA_EDITORIAL', 'LineaEditorial', 'INTEGER', false, null, null);
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Feria', 'Feria', RelationMap::MANY_TO_ONE, array('id_feria' => 'id', ), null, null);
		$this->addRelation('Expositor', 'Expositor', RelationMap::MANY_TO_ONE, array('id_expositor' => 'id', ), null, null);
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

} // ExpositorLineaeditorialTableMap
