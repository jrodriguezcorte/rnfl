<?php

/**
 * Actividad filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseActividadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                     => new sfWidgetFormFilterInput(),
      'ejecutada'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'cantidad_participantes_m'   => new sfWidgetFormFilterInput(),
      'cantidad_participantes_f'   => new sfWidgetFormFilterInput(),
      'alcanzo_tiempo'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'causas_incumplimiento'      => new sfWidgetFormFilterInput(),
      'observaciones'              => new sfWidgetFormFilterInput(),
      'id_tipo_actividad'          => new sfWidgetFormPropelChoice(array('model' => 'TipoActividad', 'add_empty' => true)),
      'observacion_tipo_actividad' => new sfWidgetFormFilterInput(),
      'fecha'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora'                       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'facilitador'                => new sfWidgetFormFilterInput(),
      'id_feria'                   => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'                     => new sfValidatorPass(array('required' => false)),
      'ejecutada'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'cantidad_participantes_m'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_participantes_f'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'alcanzo_tiempo'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'causas_incumplimiento'      => new sfValidatorPass(array('required' => false)),
      'observaciones'              => new sfValidatorPass(array('required' => false)),
      'id_tipo_actividad'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoActividad', 'column' => 'id')),
      'observacion_tipo_actividad' => new sfValidatorPass(array('required' => false)),
      'fecha'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora'                       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'facilitador'                => new sfValidatorPass(array('required' => false)),
      'id_feria'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Actividad';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'nombre'                     => 'Text',
      'ejecutada'                  => 'Boolean',
      'cantidad_participantes_m'   => 'Number',
      'cantidad_participantes_f'   => 'Number',
      'alcanzo_tiempo'             => 'Boolean',
      'causas_incumplimiento'      => 'Text',
      'observaciones'              => 'Text',
      'id_tipo_actividad'          => 'ForeignKey',
      'observacion_tipo_actividad' => 'Text',
      'fecha'                      => 'Date',
      'hora'                       => 'Date',
      'facilitador'                => 'Text',
      'id_feria'                   => 'ForeignKey',
    );
  }
}
