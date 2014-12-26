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
      'id'                         => new sfWidgetFormInputHidden(),
      'nombre'                     => new sfWidgetFormInputText(),
      'datos_institucion'          => new sfWidgetFormInputText(),
      'ejecutada'                  => new sfWidgetFormInputCheckbox(),
      'cantidad_participantes_m'   => new sfWidgetFormInputText(),
      'cantidad_participantes_f'   => new sfWidgetFormInputText(),
      'alcanzo_tiempo'             => new sfWidgetFormInputCheckbox(),
      'causas_incumplimiento'      => new sfWidgetFormTextarea(),
      'observaciones'              => new sfWidgetFormTextarea(),
      'observacion_tipo_actividad' => new sfWidgetFormInputText(),
      'fecha_sugerida'             => new sfWidgetFormDate(),
      'hora_sugerida'              => new sfWidgetFormDateTime(),
      'sala'                       => new sfWidgetFormInputText(),
      'fecha'                      => new sfWidgetFormDate(),
      'hora'                       => new sfWidgetFormDateTime(),
      'facilitador'                => new sfWidgetFormInputText(),
      'id_feria'                   => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_usuario'                 => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id', 'required' => false)),
      'nombre'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'datos_institucion'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ejecutada'                  => new sfValidatorBoolean(array('required' => false)),
      'cantidad_participantes_m'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cantidad_participantes_f'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'alcanzo_tiempo'             => new sfValidatorBoolean(array('required' => false)),
      'causas_incumplimiento'      => new sfValidatorString(array('required' => false)),
      'observaciones'              => new sfValidatorString(array('required' => false)),
      'observacion_tipo_actividad' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_sugerida'             => new sfValidatorDate(array('required' => false)),
      'hora_sugerida'              => new sfValidatorDateTime(array('required' => false)),
      'sala'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha'                      => new sfValidatorDate(array('required' => false)),
      'hora'                       => new sfValidatorDateTime(array('required' => false)),
      'facilitador'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_feria'                   => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_usuario'                 => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
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
