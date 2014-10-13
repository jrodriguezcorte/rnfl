<?php

/**
 * Expositor form base class.
 *
 * @method Expositor getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseExpositorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'nombre'   => new sfWidgetFormInputText(),
      'apellido' => new sfWidgetFormInputText(),
      'cedula'   => new sfWidgetFormInputText(),
      'rif'      => new sfWidgetFormInputText(),
      'id_pais'  => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'nombre'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellido' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cedula'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rif'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_pais'  => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expositor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Expositor';
  }


}
