<?php

/**
 * FeriaSelloeditorial form base class.
 *
 * @method FeriaSelloeditorial getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFeriaSelloeditorialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'id_feria'          => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_selloeditorial' => new sfWidgetFormPropelChoice(array('model' => 'SelloEditorial', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'FeriaSelloeditorial', 'column' => 'id', 'required' => false)),
      'id_feria'          => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_selloeditorial' => new sfValidatorPropelChoice(array('model' => 'SelloEditorial', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('feria_selloeditorial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FeriaSelloeditorial';
  }


}
