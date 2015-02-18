<?php

/**
 * IncumplmientoActividadFinalizada form base class.
 *
 * @method IncumplmientoActividadFinalizada getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseIncumplmientoActividadFinalizadaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'id_actividad'                => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_feria'                    => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_actividad_finalizada'     => new sfWidgetFormPropelChoice(array('model' => 'ActividadFinalizada', 'add_empty' => true)),
      'id_incumplimiento_actividad' => new sfWidgetFormPropelChoice(array('model' => 'IncumplimientoActividad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorPropelChoice(array('model' => 'IncumplmientoActividadFinalizada', 'column' => 'id', 'required' => false)),
      'id_actividad'                => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id', 'required' => false)),
      'id_feria'                    => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_actividad_finalizada'     => new sfValidatorPropelChoice(array('model' => 'ActividadFinalizada', 'column' => 'id', 'required' => false)),
      'id_incumplimiento_actividad' => new sfValidatorPropelChoice(array('model' => 'IncumplimientoActividad', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('incumplmiento_actividad_finalizada[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IncumplmientoActividadFinalizada';
  }


}
