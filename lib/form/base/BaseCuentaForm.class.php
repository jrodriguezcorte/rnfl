<?php

/**
 * Cuenta form base class.
 *
 * @method Cuenta getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCuentaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'id_banco'     => new sfWidgetFormPropelChoice(array('model' => 'Banco', 'add_empty' => true)),
      'swift'        => new sfWidgetFormInputText(),
      'aba'          => new sfWidgetFormInputText(),
      'beneficiario' => new sfWidgetFormInputText(),
      'id_feria'     => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'numero'       => new sfWidgetFormInputText(),
      'activo'       => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Cuenta', 'column' => 'id', 'required' => false)),
      'id_banco'     => new sfValidatorPropelChoice(array('model' => 'Banco', 'column' => 'id', 'required' => false)),
      'swift'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'aba'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'beneficiario' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_feria'     => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'numero'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'activo'       => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cuenta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cuenta';
  }


}
