<?php



/**
 * This class defines the structure of the 'ponente_actividad' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Sat Oct  4 21:39:07 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class PonenteActividadTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PonenteActividadTableMap';

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
		$this->setName('ponente_actividad');
		$this->setPhpName('PonenteActividad');
		$this->setClassname('PonenteActividad');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('ponente_actividad_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addForeignKey('ID_PONENTE', 'IdPonente', 'INTEGER', 'ponente', 'ID', false, null, null);
		$this->addForeignKey('ID_ACTIVIDAD', 'IdActividad', 'INTEGER', 'actividad', 'ID', false, null, null);
		$this->addForeignKey('ID_FERIA', 'IdFeria', 'INTEGER', 'feria', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Ponente', 'Ponente', RelationMap::MANY_TO_ONE, array('id_ponente' => 'id', ), null, null);
		$this->addRelation('Actividad', 'Actividad', RelationMap::MANY_TO_ONE, array('id_actividad' => 'id', ), null, null);
		$this->addRelation('Feria', 'Feria', RelationMap::MANY_TO_ONE, array('id_feria' => 'id', ), null, null);
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

} // PonenteActividadTableMap