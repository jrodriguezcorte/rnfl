<?php



/**
 * This class defines the structure of the 'parroquia' table.
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
class ParroquiaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ParroquiaTableMap';

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
		$this->setName('parroquia');
		$this->setPhpName('Parroquia');
		$this->setClassname('Parroquia');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('parroquia_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 255, null);
		$this->addForeignKey('ID_MUNICIPIO', 'IdMunicipio', 'INTEGER', 'municipio', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Municipio', 'Municipio', RelationMap::MANY_TO_ONE, array('id_municipio' => 'id', ), null, null);
		$this->addRelation('ActividadFinalizada', 'ActividadFinalizada', RelationMap::ONE_TO_MANY, array('id' => 'id_parroquia', ), null, null, 'ActividadFinalizadas');
		$this->addRelation('Feria', 'Feria', RelationMap::ONE_TO_MANY, array('id' => 'id_parroquia', ), null, null, 'Ferias');
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

} // ParroquiaTableMap
