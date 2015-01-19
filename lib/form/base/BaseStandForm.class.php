<?php

/**
 * Stand form base class.
 *
 * @method Stand getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseStandForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'id_feria' => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'metros'   => new sfWidgetFormInputText(),
      'costo_bs' => new sfWidgetFormInputText(),
      'costo_ds' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'Stand', 'column' => 'id', 'required' => false)),
      'id_feria' => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'metros'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'costo_bs' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'costo_ds' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('stand[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stand';
  }


}
