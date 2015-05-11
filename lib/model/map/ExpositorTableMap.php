<?php



/**
 * This class defines the structure of the 'expositor' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Mon May 11 16:29:19 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ExpositorTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ExpositorTableMap';

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
		$this->setName('expositor');
		$this->setPhpName('Expositor');
		$this->setClassname('Expositor');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('expositor_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 255, null);
		$this->addColumn('APELLIDO', 'Apellido', 'VARCHAR', false, 255, null);
		$this->addColumn('RIF', 'Rif', 'VARCHAR', false, 255, null);
		$this->addForeignKey('ID_PAIS', 'IdPais', 'INTEGER', 'pais', 'ID', false, null, null);
		$this->addColumn('NOMBRE_EMPRESA', 'NombreEmpresa', 'VARCHAR', false, 255, null);
		$this->addColumn('NOMBRE_DIRECTOR', 'NombreDirector', 'VARCHAR', false, 255, null);
		$this->addColumn('NOMBRE_EJECUTIVO_FERIA', 'NombreEjecutivoFeria', 'VARCHAR', false, 255, null);
		$this->addColumn('DIRECCION', 'Direccion', 'VARCHAR', false, 255, null);
		$this->addColumn('CIUDAD', 'Ciudad', 'VARCHAR', false, 255, null);
		$this->addColumn('TELEFONO_LOCAL', 'TelefonoLocal', 'VARCHAR', false, 255, null);
		$this->addColumn('TELEFONO_CELULAR', 'TelefonoCelular', 'VARCHAR', false, 255, null);
		$this->addColumn('FAX', 'Fax', 'VARCHAR', false, 255, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('SITIO_WEB', 'SitioWeb', 'VARCHAR', false, 255, null);
		$this->addColumn('ES_VENEZOLANO', 'EsVenezolano', 'BOOLEAN', false, null, null);
		$this->addForeignKey('ID_USUARIO', 'IdUsuario', 'INTEGER', 'usuario', 'ID', false, null, null);
		$this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, null, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Pais', 'Pais', RelationMap::MANY_TO_ONE, array('id_pais' => 'id', ), 'CASCADE', null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario' => 'id', ), 'CASCADE', 'CASCADE');
		$this->addRelation('ExpositorFeria', 'ExpositorFeria', RelationMap::ONE_TO_MANY, array('id' => 'id_expositor', ), 'CASCADE', null, 'ExpositorFerias');
		$this->addRelation('ExpositorLineaeditorial', 'ExpositorLineaeditorial', RelationMap::ONE_TO_MANY, array('id' => 'id_expositor', ), 'CASCADE', null, 'ExpositorLineaeditorials');
		$this->addRelation('PagoExpositor', 'PagoExpositor', RelationMap::ONE_TO_MANY, array('id' => 'id_expositor', ), 'CASCADE', null, 'PagoExpositors');
		$this->addRelation('Status', 'Status', RelationMap::ONE_TO_MANY, array('id' => 'id_expositor', ), 'CASCADE', null, 'Statuss');
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

} // ExpositorTableMap
