<?php

/**
 * Actividad form base class.
 *
 * @method Actividad getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseActividadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'fecha_sugerida'        => new sfWidgetFormDate(),
      'hora'                  => new sfWidgetFormDateTime(),
      'id_feria'              => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_usuario'            => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'stand_numero'          => new sfWidgetFormInputText(),
      'nombre_empresa'        => new sfWidgetFormInputText(),
      'direccion'             => new sfWidgetFormInputText(),
      'nombre_solicitante'    => new sfWidgetFormInputText(),
      'nombre_representante'  => new sfWidgetFormInputText(),
      'telefono_local'        => new sfWidgetFormInputText(),
      'telefono_celular'      => new sfWidgetFormInputText(),
      'fax'                   => new sfWidgetFormInputText(),
      'email'                 => new sfWidgetFormInputText(),
      'id_tipo_actividad'     => new sfWidgetFormPropelChoice(array('model' => 'TipoActividad', 'add_empty' => true)),
      'titulo'                => new sfWidgetFormInputText(),
      'autor'                 => new sfWidgetFormInputText(),
      'editorial'             => new sfWidgetFormInputText(),
      'descripcion_actividad' => new sfWidgetFormTextarea(),
      'presente_autor'        => new sfWidgetFormInputCheckbox(),
      'publico_dirigido'      => new sfWidgetFormInputText(),
      'numero_ponentes'       => new sfWidgetFormInputText(),
      'actividad_cerrada'     => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id', 'required' => false)),
      'fecha_sugerida'        => new sfValidatorDate(array('required' => false)),
      'hora'                  => new sfValidatorDateTime(array('required' => false)),
      'id_feria'              => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_usuario'            => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'stand_numero'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'nombre_empresa'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccion'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_solicitante'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_representante'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_local'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_celular'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_tipo_actividad'     => new sfValidatorPropelChoice(array('model' => 'TipoActividad', 'column' => 'id', 'required' => false)),
      'titulo'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'autor'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'editorial'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descripcion_actividad' => new sfValidatorString(array('required' => false)),
      'presente_autor'        => new sfValidatorBoolean(array('required' => false)),
      'publico_dirigido'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'numero_ponentes'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'actividad_cerrada'     => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('actividad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Actividad';
  }


}
