<?php



/**
 * This class defines the structure of the 'pago_expositor' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon May 11 16:29:20 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class PagoExpositorTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PagoExpositorTableMap';

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
		$this->setName('pago_expositor');
		$this->setPhpName('PagoExpositor');
		$this->setClassname('PagoExpositor');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('pago_expositor_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addColumn('MONTO', 'Monto', 'DECIMAL', false, null, null);
		$this->addForeignKey('ID_FERIA', 'IdFeria', 'INTEGER', 'feria', 'ID', false, null, null);
		$this->addForeignKey('ID_EXPOSITOR', 'IdExpositor', 'INTEGER', 'expositor', 'ID', false, null, null);
		$this->addForeignKey('ID_USUARIO', 'IdUsuario', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addForeignKey('ID_EXPOSITOR_FERIA', 'IdExpositorFeria', 'INTEGER', 'expositor_feria', 'ID', false, null, null);
		$this->addColumn('STATUS_ACTUAL', 'StatusActual', 'BOOLEAN', false, null, null);
		$this->addColumn('PAGO_APROBADO', 'PagoAprobado', 'BOOLEAN', false, null, null);
		$this->addColumn('FECHA', 'Fecha', 'DATE', false, null, 'now()');
		$this->addForeignKey('ID_BANCO', 'IdBanco', 'INTEGER', 'banco', 'ID', false, null, null);
		$this->addColumn('NUMERO_DEPOSITO', 'NumeroDeposito', 'INTEGER', false, null, null);
		$this->addColumn('FECHA_PAGO', 'FechaPago', 'DATE', false, null, null);
		$this->addColumn('ES_PAGO_BANCO_NACIONAL', 'EsPagoBancoNacional', 'BOOLEAN', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Feria', 'Feria', RelationMap::MANY_TO_ONE, array('id_feria' => 'id', ), 'CASCADE', null);
		$this->addRelation('Expositor', 'Expositor', RelationMap::MANY_TO_ONE, array('id_expositor' => 'id', ), 'CASCADE', null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario' => 'id', ), 'CASCADE', null);
		$this->addRelation('ExpositorFeria', 'ExpositorFeria', RelationMap::MANY_TO_ONE, array('id_expositor_feria' => 'id', ), 'CASCADE', null);
		$this->addRelation('Banco', 'Banco', RelationMap::MANY_TO_ONE, array('id_banco' => 'id', ), 'CASCADE', null);
		$this->addRelation('Status', 'Status', RelationMap::ONE_TO_MANY, array('id' => 'id_pago_expositor', ), 'CASCADE', null, 'Statuss');
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

} // PagoExpositorTableMap
