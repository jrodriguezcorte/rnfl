<?php

/**
 * ExpositorLineaeditorial form base class.
 *
 * @method ExpositorLineaeditorial getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseExpositorLineaeditorialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_feria'        => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'    => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'linea_editorial' => new sfWidgetFormInputText(),
      'id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_feria'        => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_expositor'    => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'linea_editorial' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'id'              => new sfValidatorPropelChoice(array('model' => 'ExpositorLineaeditorial', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expositor_lineaeditorial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExpositorLineaeditorial';
  }


}
