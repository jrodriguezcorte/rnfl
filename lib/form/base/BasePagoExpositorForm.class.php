<?php

/**
 * PagoExpositor form base class.
 *
 * @method PagoExpositor getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePagoExpositorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'monto'                  => new sfWidgetFormInputText(),
      'id_feria'               => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'           => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_usuario'             => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'id_expositor_feria'     => new sfWidgetFormPropelChoice(array('model' => 'ExpositorFeria', 'add_empty' => true)),
      'status_actual'          => new sfWidgetFormInputCheckbox(),
      'pago_aprobado'          => new sfWidgetFormInputCheckbox(),
      'fecha'                  => new sfWidgetFormDate(),
      'id_banco'               => new sfWidgetFormPropelChoice(array('model' => 'Banco', 'add_empty' => true)),
      'numero_deposito'        => new sfWidgetFormInputText(),
      'fecha_pago'             => new sfWidgetFormDate(),
      'es_pago_banco_nacional' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'PagoExpositor', 'column' => 'id', 'required' => false)),
      'monto'                  => new sfValidatorNumber(array('required' => false)),
      'id_feria'               => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_expositor'           => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'id_usuario'             => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'id_expositor_feria'     => new sfValidatorPropelChoice(array('model' => 'ExpositorFeria', 'column' => 'id', 'required' => false)),
      'status_actual'          => new sfValidatorBoolean(array('required' => false)),
      'pago_aprobado'          => new sfValidatorBoolean(array('required' => false)),
      'fecha'                  => new sfValidatorDate(array('required' => false)),
      'id_banco'               => new sfValidatorPropelChoice(array('model' => 'Banco', 'column' => 'id', 'required' => false)),
      'numero_deposito'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'fecha_pago'             => new sfValidatorDate(array('required' => false)),
      'es_pago_banco_nacional' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pago_expositor[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PagoExpositor';
  }


}
