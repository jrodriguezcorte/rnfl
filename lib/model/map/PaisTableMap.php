<?php



/**
 * This class defines the structure of the 'pais' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Sun Feb 22 12:26:16 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class PaisTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PaisTableMap';

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
		$this->setName('pais');
		$this->setPhpName('Pais');
		$this->setClassname('Pais');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('pais_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('ActividadFinalizada', 'ActividadFinalizada', RelationMap::ONE_TO_MANY, array('id' => 'id_pais', ), 'CASCADE', null, 'ActividadFinalizadas');
		$this->addRelation('Banco', 'Banco', RelationMap::ONE_TO_MANY, array('id' => 'id_pais', ), 'CASCADE', null, 'Bancos');
		$this->addRelation('Estado', 'Estado', RelationMap::ONE_TO_MANY, array('id' => 'id_pais', ), 'CASCADE', null, 'Estados');
		$this->addRelation('Expositor', 'Expositor', RelationMap::ONE_TO_MANY, array('id' => 'id_pais', ), 'CASCADE', null, 'Expositors');
		$this->addRelation('FeriaRelatedByIdPaisHomenajeado', 'Feria', RelationMap::ONE_TO_MANY, array('id' => 'id_pais_homenajeado', ), 'CASCADE', null, 'FeriasRelatedByIdPaisHomenajeado');
		$this->addRelation('FeriaRelatedByIdPais', 'Feria', RelationMap::ONE_TO_MANY, array('id' => 'id_pais', ), 'CASCADE', null, 'FeriasRelatedByIdPais');
		$this->addRelation('Ponente', 'Ponente', RelationMap::ONE_TO_MANY, array('id' => 'nacionalidad', ), 'CASCADE', null, 'Ponentes');
		$this->addRelation('SelloEditorial', 'SelloEditorial', RelationMap::ONE_TO_MANY, array('id' => 'id_pais', ), 'CASCADE', null, 'SelloEditorials');
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

} // PaisTableMap
