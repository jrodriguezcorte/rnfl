<?php



/**
 * This class defines the structure of the 'expositor_feria' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Fri May  1 16:52:44 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ExpositorFeriaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ExpositorFeriaTableMap';

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
		$this->setName('expositor_feria');
		$this->setPhpName('ExpositorFeria');
		$this->setClassname('ExpositorFeria');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('expositor_feria_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addForeignKey('ID_FERIA', 'IdFeria', 'INTEGER', 'feria', 'ID', false, null, null);
		$this->addForeignKey('ID_EXPOSITOR', 'IdExpositor', 'INTEGER', 'expositor', 'ID', false, null, null);
		$this->addForeignKey('ID_TIPO_DISTRIBUIDOR', 'IdTipoDistribuidor', 'INTEGER', 'tipo_distribuidor', 'ID', false, null, null);
		$this->addColumn('SELLO_EDITORIAL', 'SelloEditorial', 'VARCHAR', false, 255, null);
		$this->addColumn('DOMICILIO_FISCAL', 'DomicilioFiscal', 'VARCHAR', false, 255, null);
		$this->addColumn('RESPONSABLE_STAND', 'ResponsableStand', 'VARCHAR', false, 255, null);
		$this->addForeignKey('ID_STAND', 'IdStand', 'INTEGER', 'stand', 'ID', false, null, null);
		$this->addColumn('NUMERO_TITULOS', 'NumeroTitulos', 'INTEGER', false, null, null);
		$this->addColumn('NUMERO_NOVEDADES', 'NumeroNovedades', 'INTEGER', false, null, null);
		$this->addColumn('OBSERVACIONES', 'Observaciones', 'LONGVARCHAR', false, null, null);
		$this->addForeignKey('ID_USUARIO', 'IdUsuario', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addColumn('NOMBRE_CENEFA', 'NombreCenefa', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Feria', 'Feria', RelationMap::MANY_TO_ONE, array('id_feria' => 'id', ), 'CASCADE', null);
		$this->addRelation('Expositor', 'Expositor', RelationMap::MANY_TO_ONE, array('id_expositor' => 'id', ), 'CASCADE', null);
		$this->addRelation('TipoDistribuidor', 'TipoDistribuidor', RelationMap::MANY_TO_ONE, array('id_tipo_distribuidor' => 'id', ), 'CASCADE', null);
		$this->addRelation('Stand', 'Stand', RelationMap::MANY_TO_ONE, array('id_stand' => 'id', ), 'CASCADE', null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario' => 'id', ), 'CASCADE', null);
		$this->addRelation('PagoExpositor', 'PagoExpositor', RelationMap::ONE_TO_MANY, array('id' => 'id_expositor_feria', ), 'CASCADE', null, 'PagoExpositors');
		$this->addRelation('Status', 'Status', RelationMap::ONE_TO_MANY, array('id' => 'id_expositor_feria', ), 'CASCADE', null, 'Statuss');
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

} // ExpositorFeriaTableMap
