<?php

/**
 * Banco form base class.
 *
 * @method Banco getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBancoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInputText(),
      'es_nacional' => new sfWidgetFormInputCheckbox(),
      'id_feria'    => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_pais'     => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'id_moneda'   => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Banco', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'es_nacional' => new sfValidatorBoolean(array('required' => false)),
      'id_feria'    => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_pais'     => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'id_moneda'   => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('banco[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banco';
  }


}
