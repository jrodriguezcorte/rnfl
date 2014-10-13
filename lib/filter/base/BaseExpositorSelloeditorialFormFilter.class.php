<?php

/**
 * ExpositorSelloeditorial filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseExpositorSelloeditorialFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_feria'           => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'       => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_sello_editorial' => new sfWidgetFormPropelChoice(array('model' => 'SelloEditorial', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_feria'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_expositor'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Expositor', 'column' => 'id')),
      'id_sello_editorial' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SelloEditorial', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('expositor_selloeditorial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExpositorSelloeditorial';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'id_feria'           => 'ForeignKey',
      'id_expositor'       => 'ForeignKey',
      'id_sello_editorial' => 'ForeignKey',
    );
  }
}
