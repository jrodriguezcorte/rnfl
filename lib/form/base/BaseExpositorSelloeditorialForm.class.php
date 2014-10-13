<?php

/**
 * ExpositorSelloeditorial form base class.
 *
 * @method ExpositorSelloeditorial getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseExpositorSelloeditorialForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'id_feria'           => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'       => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_sello_editorial' => new sfWidgetFormPropelChoice(array('model' => 'SelloEditorial', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'ExpositorSelloeditorial', 'column' => 'id', 'required' => false)),
      'id_feria'           => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_expositor'       => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'id_sello_editorial' => new sfValidatorPropelChoice(array('model' => 'SelloEditorial', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expositor_selloeditorial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExpositorSelloeditorial';
  }


}
