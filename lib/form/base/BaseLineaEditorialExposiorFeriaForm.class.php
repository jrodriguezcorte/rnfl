<?php

/**
 * LineaEditorialExposiorFeria form base class.
 *
 * @method LineaEditorialExposiorFeria getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLineaEditorialExposiorFeriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'id_expositor_feria' => new sfWidgetFormPropelChoice(array('model' => 'ExpositorFeria', 'add_empty' => true)),
      'id_linea_editorial' => new sfWidgetFormPropelChoice(array('model' => 'LineaEditorial', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'LineaEditorialExposiorFeria', 'column' => 'id', 'required' => false)),
      'id_expositor_feria' => new sfValidatorPropelChoice(array('model' => 'ExpositorFeria', 'column' => 'id', 'required' => false)),
      'id_linea_editorial' => new sfValidatorPropelChoice(array('model' => 'LineaEditorial', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('linea_editorial_exposior_feria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LineaEditorialExposiorFeria';
  }


}
