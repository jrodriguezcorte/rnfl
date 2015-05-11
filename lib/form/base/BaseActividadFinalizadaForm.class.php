<?php

/**
 * ActividadFinalizada form base class.
 *
 * @method ActividadFinalizada getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseActividadFinalizadaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'id_actividad'            => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_feria'                => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'nombre_responsable'      => new sfWidgetFormInputText(),
      'fecha_ejecucion'         => new sfWidgetFormDate(),
      'hora_ejecucion'          => new sfWidgetFormTime(),
      'hora_fin_ejecucion'      => new sfWidgetFormTime(),
      'participantes_m'         => new sfWidgetFormInputText(),
      'participantes_f'         => new sfWidgetFormInputText(),
      'total'                   => new sfWidgetFormInputText(),
      'evento_publico'          => new sfWidgetFormInputCheckbox(),
      'otro_incumplimiento'     => new sfWidgetFormInputText(),
      'nombre_institucion'      => new sfWidgetFormInputText(),
      'id_pais'                 => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'id_estado'               => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
      'id_municipio'            => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => true)),
      'id_parroquia'            => new sfWidgetFormPropelChoice(array('model' => 'Parroquia', 'add_empty' => true)),
      'id_region'               => new sfWidgetFormPropelChoice(array('model' => 'Region', 'add_empty' => true)),
      'incluir_info_geografica' => new sfWidgetFormInputCheckbox(),
      'id_usuario'              => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'activo'                  => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'ActividadFinalizada', 'column' => 'id', 'required' => false)),
      'id_actividad'            => new sfValidatorPropelChoice(array('model' => 'Actividad', 'column' => 'id', 'required' => false)),
      'id_feria'                => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'nombre_responsable'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_ejecucion'         => new sfValidatorDate(array('required' => false)),
      'hora_ejecucion'          => new sfValidatorTime(array('required' => false)),
      'hora_fin_ejecucion'      => new sfValidatorTime(array('required' => false)),
      'participantes_m'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'participantes_f'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'total'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'evento_publico'          => new sfValidatorBoolean(array('required' => false)),
      'otro_incumplimiento'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_institucion'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_pais'                 => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'id_estado'               => new sfValidatorPropelChoice(array('model' => 'Estado', 'column' => 'id', 'required' => false)),
      'id_municipio'            => new sfValidatorPropelChoice(array('model' => 'Municipio', 'column' => 'id', 'required' => false)),
      'id_parroquia'            => new sfValidatorPropelChoice(array('model' => 'Parroquia', 'column' => 'id', 'required' => false)),
      'id_region'               => new sfValidatorPropelChoice(array('model' => 'Region', 'column' => 'id', 'required' => false)),
      'incluir_info_geografica' => new sfValidatorBoolean(array('required' => false)),
      'id_usuario'              => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'activo'                  => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('actividad_finalizada[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActividadFinalizada';
  }


}
