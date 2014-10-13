<?php

/**
 * Ponente form base class.
 *
 * @method Ponente getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePonenteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre'           => new sfWidgetFormInputText(),
      'apellido'         => new sfWidgetFormInputText(),
      'cedula'           => new sfWidgetFormInputText(),
      'rif'              => new sfWidgetFormInputText(),
      'sexo'             => new sfWidgetFormInputText(),
      'nacionalidad'     => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'telefono_local'   => new sfWidgetFormInputText(),
      'telefono_celular' => new sfWidgetFormInputText(),
      'email'            => new sfWidgetFormInputText(),
      'observaciones'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Ponente', 'column' => 'id', 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellido'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cedula'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rif'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sexo'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nacionalidad'     => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'telefono_local'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_celular' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'observaciones'    => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ponente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ponente';
  }


}
