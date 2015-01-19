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
      'id'                     => new sfWidgetFormInputHidden(),
      'nombre'                 => new sfWidgetFormInputText(),
      'apellido'               => new sfWidgetFormInputText(),
      'rif'                    => new sfWidgetFormInputText(),
      'id_pais'                => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'nombre_empresa'         => new sfWidgetFormInputText(),
      'nombre_director'        => new sfWidgetFormInputText(),
      'nombre_ejecutivo_feria' => new sfWidgetFormInputText(),
      'direccion'              => new sfWidgetFormInputText(),
      'ciudad'                 => new sfWidgetFormInputText(),
      'telefono_local'         => new sfWidgetFormInputText(),
      'telefono_celular'       => new sfWidgetFormInputText(),
      'fax'                    => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'sitio_web'              => new sfWidgetFormInputText(),
      'es_venezolano'          => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'nombre'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'apellido'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rif'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_pais'                => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'nombre_empresa'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_director'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_ejecutivo_feria' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccion'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ciudad'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_local'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_celular'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sitio_web'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'es_venezolano'          => new sfValidatorBoolean(array('required' => false)),
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
