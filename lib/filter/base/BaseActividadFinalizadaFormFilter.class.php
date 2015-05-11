<?php

/**
 * ActividadFinalizada filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseActividadFinalizadaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_actividad'            => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_feria'                => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'nombre_responsable'      => new sfWidgetFormFilterInput(),
      'fecha_ejecucion'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora_ejecucion'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora_fin_ejecucion'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'participantes_m'         => new sfWidgetFormFilterInput(),
      'participantes_f'         => new sfWidgetFormFilterInput(),
      'total'                   => new sfWidgetFormFilterInput(),
      'evento_publico'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'otro_incumplimiento'     => new sfWidgetFormFilterInput(),
      'nombre_institucion'      => new sfWidgetFormFilterInput(),
      'id_pais'                 => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'id_estado'               => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
      'id_municipio'            => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => true)),
      'id_parroquia'            => new sfWidgetFormPropelChoice(array('model' => 'Parroquia', 'add_empty' => true)),
      'id_region'               => new sfWidgetFormPropelChoice(array('model' => 'Region', 'add_empty' => true)),
      'incluir_info_geografica' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'id_usuario'              => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'activo'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_actividad'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Actividad', 'column' => 'id')),
      'id_feria'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'nombre_responsable'      => new sfValidatorPass(array('required' => false)),
      'fecha_ejecucion'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora_ejecucion'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora_fin_ejecucion'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'participantes_m'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'participantes_f'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'evento_publico'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'otro_incumplimiento'     => new sfValidatorPass(array('required' => false)),
      'nombre_institucion'      => new sfValidatorPass(array('required' => false)),
      'id_pais'                 => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'id_estado'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Estado', 'column' => 'id')),
      'id_municipio'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Municipio', 'column' => 'id')),
      'id_parroquia'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Parroquia', 'column' => 'id')),
      'id_region'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Region', 'column' => 'id')),
      'incluir_info_geografica' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'id_usuario'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'activo'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('actividad_finalizada_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActividadFinalizada';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'id_actividad'            => 'ForeignKey',
      'id_feria'                => 'ForeignKey',
      'nombre_responsable'      => 'Text',
      'fecha_ejecucion'         => 'Date',
      'hora_ejecucion'          => 'Date',
      'hora_fin_ejecucion'      => 'Date',
      'participantes_m'         => 'Number',
      'participantes_f'         => 'Number',
      'total'                   => 'Number',
      'evento_publico'          => 'Boolean',
      'otro_incumplimiento'     => 'Text',
      'nombre_institucion'      => 'Text',
      'id_pais'                 => 'ForeignKey',
      'id_estado'               => 'ForeignKey',
      'id_municipio'            => 'ForeignKey',
      'id_parroquia'            => 'ForeignKey',
      'id_region'               => 'ForeignKey',
      'incluir_info_geografica' => 'Boolean',
      'id_usuario'              => 'ForeignKey',
      'activo'                  => 'Boolean',
    );
  }
}
