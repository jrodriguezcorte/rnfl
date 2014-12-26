<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUsuarioForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'nombre'              => new sfWidgetFormInputText(),
      'apellido'            => new sfWidgetFormInputText(),
      'cedula'              => new sfWidgetFormInputText(),
      'isbn'                => new sfWidgetFormInputText(),
      'login'               => new sfWidgetFormInputText(),
      'contrasena'          => new sfWidgetFormInputText(),
      'sf_guard_user'       => new sfWidgetFormInputText(),
      'sexo'                => new sfWidgetFormInputCheckbox(),
      'sf_guard_user_group' => new sfWidgetFormInputText(),
      'tipo_organizador'    => new sfWidgetFormInputCheckbox(),
      'ente_organizador'    => new sfWidgetFormInputText(),
      'sector'              => new sfWidgetFormInputCheckbox(),
      'unidad_responsable'  => new sfWidgetFormInputText(),
      'correo'              => new sfWidgetFormInputText(),
      'telefono'            => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'nombre'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellido'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cedula'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'isbn'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'login'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contrasena'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sf_guard_user'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'sexo'                => new sfValidatorBoolean(array('required' => false)),
      'sf_guard_user_group' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'tipo_organizador'    => new sfValidatorBoolean(array('required' => false)),
      'ente_organizador'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sector'              => new sfValidatorBoolean(array('required' => false)),
      'unidad_responsable'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'correo'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }


}
