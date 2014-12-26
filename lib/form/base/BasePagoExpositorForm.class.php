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
      'id'                         => new sfWidgetFormInputHidden(),
      'forma_pago'                 => new sfWidgetFormInputCheckbox(),
      'deposito_nacional'          => new sfWidgetFormInputText(),
      'planilla_deposito_nacional' => new sfWidgetFormInputText(),
      'transferencia_cuenta'       => new sfWidgetFormInputText(),
      'banco_emisor'               => new sfWidgetFormInputText(),
      'numero_transaccion'         => new sfWidgetFormInputText(),
      'monto'                      => new sfWidgetFormInputText(),
      'id_feria'                   => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'               => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_usuario'                 => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'id_expositor_feria'         => new sfWidgetFormPropelChoice(array('model' => 'ExpositorFeria', 'add_empty' => true)),
      'status_actual'              => new sfWidgetFormInputCheckbox(),
      'pago_aprobado'              => new sfWidgetFormInputCheckbox(),
      'fecha'                      => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorPropelChoice(array('model' => 'PagoExpositor', 'column' => 'id', 'required' => false)),
      'forma_pago'                 => new sfValidatorBoolean(array('required' => false)),
      'deposito_nacional'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'planilla_deposito_nacional' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'transferencia_cuenta'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'banco_emisor'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'numero_transaccion'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'monto'                      => new sfValidatorNumber(array('required' => false)),
      'id_feria'                   => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_expositor'               => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'id_usuario'                 => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'id_expositor_feria'         => new sfValidatorPropelChoice(array('model' => 'ExpositorFeria', 'column' => 'id', 'required' => false)),
      'status_actual'              => new sfValidatorBoolean(array('required' => false)),
      'pago_aprobado'              => new sfValidatorBoolean(array('required' => false)),
      'fecha'                      => new sfValidatorDate(array('required' => false)),
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
