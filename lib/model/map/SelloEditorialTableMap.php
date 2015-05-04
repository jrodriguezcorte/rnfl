<?php



/**
 * This class defines the structure of the 'sello_editorial' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Fri May  1 16:52:45 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class SelloEditorialTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.SelloEditorialTableMap';

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
		$this->setName('sello_editorial');
		$this->setPhpName('SelloEditorial');
		$this->setClassname('SelloEditorial');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('sello_editorial_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 255, null);
		$this->addForeignKey('ID_PAIS', 'IdPais', 'INTEGER', 'pais', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Pais', 'Pais', RelationMap::MANY_TO_ONE, array('id_pais' => 'id', ), 'CASCADE', null);
		$this->addRelation('FeriaSelloeditorial', 'FeriaSelloeditorial', RelationMap::ONE_TO_MANY, array('id' => 'id_selloeditorial', ), 'CASCADE', null, 'FeriaSelloeditorials');
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

} // SelloEditorialTableMap
