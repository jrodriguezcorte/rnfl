<?php

/**
 * Status form base class.
 *
 * @method Status getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseStatusForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'id_feria'           => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'       => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_status'          => new sfWidgetFormPropelChoice(array('model' => 'TipoStatus', 'add_empty' => true)),
      'observaciones'      => new sfWidgetFormInputText(),
      'fecha'              => new sfWidgetFormDate(),
      'id_expositor_feria' => new sfWidgetFormPropelChoice(array('model' => 'ExpositorFeria', 'add_empty' => true)),
      'status_actual'      => new sfWidgetFormInputCheckbox(),
      'id_pago_expositor'  => new sfWidgetFormPropelChoice(array('model' => 'PagoExpositor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Status', 'column' => 'id', 'required' => false)),
      'id_feria'           => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_expositor'       => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'id_status'          => new sfValidatorPropelChoice(array('model' => 'TipoStatus', 'column' => 'id', 'required' => false)),
      'observaciones'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha'              => new sfValidatorDate(array('required' => false)),
      'id_expositor_feria' => new sfValidatorPropelChoice(array('model' => 'ExpositorFeria', 'column' => 'id', 'required' => false)),
      'status_actual'      => new sfValidatorBoolean(array('required' => false)),
      'id_pago_expositor'  => new sfValidatorPropelChoice(array('model' => 'PagoExpositor', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('status[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Status';
  }


}
