<?php

/**
 * ActividadTipoActividad form base class.
 *
 * @method ActividadTipoActividad getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseActividadTipoActividadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'id_actividad'      => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_tipo_actividad' => new sfWidgetFormPropelChoice(array('model' => 'TipoActividad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'ActividadTipoActividad', 'column' => 'id', 'required' => false)),
      'id_actividad'      => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id', 'required' => false)),
      'id_tipo_actividad' => new sfValidatorPropelChoice(array('model' => 'TipoActividad', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('actividad_tipo_actividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActividadTipoActividad';
  }


}
