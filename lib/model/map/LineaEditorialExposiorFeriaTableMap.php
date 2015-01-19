<?php



/**
 * This class defines the structure of the 'linea_editorial_exposior_feria' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon Jan 12 13:12:43 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class LineaEditorialExposiorFeriaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LineaEditorialExposiorFeriaTableMap';

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
		$this->setName('linea_editorial_exposior_feria');
		$this->setPhpName('LineaEditorialExposiorFeria');
		$this->setClassname('LineaEditorialExposiorFeria');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('linea_editorial_exposior_feria_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addColumn('ID_EXPOSITOR_FERIA', 'IdExpositorFeria', 'INTEGER', false, null, null);
		$this->addForeignKey('ID_LINEA_EDITORIAL', 'IdLineaEditorial', 'INTEGER', 'linea_editorial', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('LineaEditorial', 'LineaEditorial', RelationMap::MANY_TO_ONE, array('id_linea_editorial' => 'id', ), null, null);
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

} // LineaEditorialExposiorFeriaTableMap
