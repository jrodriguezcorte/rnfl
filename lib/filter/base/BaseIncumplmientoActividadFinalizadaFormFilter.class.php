<?php

/**
 * IncumplmientoActividadFinalizada filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseIncumplmientoActividadFinalizadaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_actividad'                => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_feria'                    => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_actividad_finalizada'     => new sfWidgetFormPropelChoice(array('model' => 'ActividadFinalizada', 'add_empty' => true)),
      'id_incumplimiento_actividad' => new sfWidgetFormPropelChoice(array('model' => 'IncumplimientoActividad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_actividad'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Actividad', 'column' => 'id')),
      'id_feria'                    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_actividad_finalizada'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ActividadFinalizada', 'column' => 'id')),
      'id_incumplimiento_actividad' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'IncumplimientoActividad', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('incumplmiento_actividad_finalizada_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IncumplmientoActividadFinalizada';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'id_actividad'                => 'ForeignKey',
      'id_feria'                    => 'ForeignKey',
      'id_actividad_finalizada'     => 'ForeignKey',
      'id_incumplimiento_actividad' => 'ForeignKey',
    );
  }
}
