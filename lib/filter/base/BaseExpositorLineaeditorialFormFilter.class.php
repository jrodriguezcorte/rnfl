<?php

/**
 * ExpositorLineaeditorial filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseExpositorLineaeditorialFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_feria'        => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'    => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'linea_editorial' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_feria'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_expositor'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Expositor', 'column' => 'id')),
      'linea_editorial' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('expositor_lineaeditorial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExpositorLineaeditorial';
  }

  public function getFields()
  {
    return array(
      'id_feria'        => 'ForeignKey',
      'id_expositor'    => 'ForeignKey',
      'linea_editorial' => 'Number',
      'id'              => 'Number',
    );
  }
}
