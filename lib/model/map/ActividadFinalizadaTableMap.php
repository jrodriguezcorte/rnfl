<?php



/**
 * This class defines the structure of the 'actividad_finalizada' table.
 *
 *
 * This class was autogenerated by Propel 1.6.2-dev on:
 *
 * Tue Feb 17 18:35:35 2015
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ActividadFinalizadaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ActividadFinalizadaTableMap';

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
		$this->setName('actividad_finalizada');
		$this->setPhpName('ActividadFinalizada');
		$this->setClassname('ActividadFinalizada');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('actividad_finalizada_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addForeignKey('ID_ACTIVIDAD', 'IdActividad', 'INTEGER', 'actividad', 'ID', false, null, null);
		$this->addForeignKey('ID_FERIA', 'IdFeria', 'INTEGER', 'feria', 'ID', false, null, null);
		$this->addColumn('NOMBRE_RESPONSABLE', 'NombreResponsable', 'VARCHAR', false, 255, null);
		$this->addColumn('FECHA_EJECUCION', 'FechaEjecucion', 'DATE', false, null, null);
		$this->addColumn('HORA_EJECUCION', 'HoraEjecucion', 'TIME', false, null, null);
		$this->addColumn('HORA_FIN_EJECUCION', 'HoraFinEjecucion', 'TIME', false, null, null);
		$this->addColumn('PARTICIPANTES_M', 'ParticipantesM', 'INTEGER', false, null, null);
		$this->addColumn('PARTICIPANTES_F', 'ParticipantesF', 'INTEGER', false, null, null);
		$this->addColumn('TOTAL', 'Total', 'INTEGER', false, null, null);
		$this->addColumn('EVENTO_PUBLICO', 'EventoPublico', 'BOOLEAN', false, null, null);
		$this->addColumn('OTRO_INCUMPLIMIENTO', 'OtroIncumplimiento', 'VARCHAR', false, 255, null);
		$this->addColumn('NOMBRE_INSTITUCION', 'NombreInstitucion', 'VARCHAR', false, 255, null);
		$this->addForeignKey('ID_PAIS', 'IdPais', 'INTEGER', 'pais', 'ID', false, null, 1);
		$this->addForeignKey('ID_ESTADO', 'IdEstado', 'INTEGER', 'estado', 'ID', false, null, 1);
		$this->addForeignKey('ID_MUNICIPIO', 'IdMunicipio', 'INTEGER', 'municipio', 'ID', false, null, 1);
		$this->addForeignKey('ID_PARROQUIA', 'IdParroquia', 'INTEGER', 'parroquia', 'ID', false, null, 1);
		$this->addForeignKey('ID_REGION', 'IdRegion', 'INTEGER', 'region', 'ID', false, null, 1);
		$this->addColumn('INCLUIR_INFO_GEOGRAFICA', 'IncluirInfoGeografica', 'BOOLEAN', false, null, null);
		$this->addForeignKey('ID_USUARIO', 'IdUsuario', 'INTEGER', 'usuario', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Actividad', 'Actividad', RelationMap::MANY_TO_ONE, array('id_actividad' => 'id', ), null, null);
		$this->addRelation('Feria', 'Feria', RelationMap::MANY_TO_ONE, array('id_feria' => 'id', ), null, null);
		$this->addRelation('Pais', 'Pais', RelationMap::MANY_TO_ONE, array('id_pais' => 'id', ), null, null);
		$this->addRelation('Estado', 'Estado', RelationMap::MANY_TO_ONE, array('id_estado' => 'id', ), null, null);
		$this->addRelation('Municipio', 'Municipio', RelationMap::MANY_TO_ONE, array('id_municipio' => 'id', ), null, null);
		$this->addRelation('Parroquia', 'Parroquia', RelationMap::MANY_TO_ONE, array('id_parroquia' => 'id', ), null, null);
		$this->addRelation('Region', 'Region', RelationMap::MANY_TO_ONE, array('id_region' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('id_usuario' => 'id', ), null, null);
		$this->addRelation('IncumplmientoActividadFinalizada', 'IncumplmientoActividadFinalizada', RelationMap::ONE_TO_MANY, array('id' => 'id_actividad_finalizada', ), null, null, 'IncumplmientoActividadFinalizadas');
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

} // ActividadFinalizadaTableMap
