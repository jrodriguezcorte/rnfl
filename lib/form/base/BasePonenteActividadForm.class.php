<?php

/**
 * PonenteActividad form base class.
 *
 * @method PonenteActividad getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePonenteActividadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'id_ponente'   => new sfWidgetFormPropelChoice(array('model' => 'Ponente', 'add_empty' => true)),
      'id_actividad' => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_feria'     => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'PonenteActividad', 'column' => 'id', 'required' => false)),
      'id_ponente'   => new sfValidatorPropelChoice(array('model' => 'Ponente', 'column' => 'id', 'required' => false)),
      'id_actividad' => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id', 'required' => false)),
      'id_feria'     => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ponente_actividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PonenteActividad';
  }


}
