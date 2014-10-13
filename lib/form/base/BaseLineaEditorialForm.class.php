<?php

/**
 * LineaEditorial form base class.
 *
 * @method LineaEditorial getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLineaEditorialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'nombre'        => new sfWidgetFormInputText(),
      'observaciones' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'LineaEditorial', 'column' => 'id', 'required' => false)),
      'nombre'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observaciones' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('linea_editorial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LineaEditorial';
  }


}
