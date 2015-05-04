<?php



/**
 * This class defines the structure of the 'usuario' table.
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
class UsuarioTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.UsuarioTableMap';

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
		$this->setName('usuario');
		$this->setPhpName('Usuario');
		$this->setClassname('Usuario');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('usuario_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 255, null);
		$this->addColumn('APELLIDO', 'Apellido', 'VARCHAR', false, 255, null);
		$this->addColumn('CEDULA', 'Cedula', 'VARCHAR', false, 255, null);
		$this->addColumn('ISBN', 'Isbn', 'VARCHAR', false, 255, null);
		$this->addColumn('LOGIN', 'Login', 'VARCHAR', false, 255, null);
		$this->addColumn('CONTRASENA', 'Contrasena', 'VARCHAR', false, 255, null);
		$this->addColumn('SF_GUARD_USER', 'SfGuardUser', 'INTEGER', false, null, null);
		$this->addColumn('SEXO', 'Sexo', 'BOOLEAN', false, null, null);
		$this->addColumn('SF_GUARD_USER_GROUP', 'SfGuardUserGroup', 'INTEGER', false, null, null);
		$this->addColumn('TIPO_ORGANIZADOR', 'TipoOrganizador', 'BOOLEAN', false, null, true);
		$this->addColumn('ENTE_ORGANIZADOR', 'EnteOrganizador', 'VARCHAR', false, 255, null);
		$this->addColumn('SECTOR', 'Sector', 'BOOLEAN', false, null, true);
		$this->addColumn('UNIDAD_RESPONSABLE', 'UnidadResponsable', 'VARCHAR', false, 255, null);
		$this->addColumn('CORREO', 'Correo', 'VARCHAR', false, 255, null);
		$this->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Actividad', 'Actividad', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), 'CASCADE', null, 'Actividads');
		$this->addRelation('ActividadFinalizada', 'ActividadFinalizada', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), 'CASCADE', null, 'ActividadFinalizadas');
		$this->addRelation('Expositor', 'Expositor', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), 'CASCADE', 'CASCADE', 'Expositors');
		$this->addRelation('ExpositorFeria', 'ExpositorFeria', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), 'CASCADE', null, 'ExpositorFerias');
		$this->addRelation('Feria', 'Feria', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), null, null, 'Ferias');
		$this->addRelation('PagoExpositor', 'PagoExpositor', RelationMap::ONE_TO_MANY, array('id' => 'id_usuario', ), 'CASCADE', null, 'PagoExpositors');
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

} // UsuarioTableMap
