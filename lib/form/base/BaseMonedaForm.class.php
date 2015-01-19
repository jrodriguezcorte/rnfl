<?php

/**
 * Moneda form base class.
 *
 * @method Moneda getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMonedaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'nombre'  => new sfWidgetFormInputText(),
      'simbolo' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id', 'required' => false)),
      'nombre'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'simbolo' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('moneda[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Moneda';
  }


}
