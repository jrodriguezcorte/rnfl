<?php

/**
 * LineaEditorialExposiorFeria filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLineaEditorialExposiorFeriaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_expositor_feria' => new sfWidgetFormPropelChoice(array('model' => 'ExpositorFeria', 'add_empty' => true)),
      'id_linea_editorial' => new sfWidgetFormPropelChoice(array('model' => 'LineaEditorial', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_expositor_feria' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ExpositorFeria', 'column' => 'id')),
      'id_linea_editorial' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'LineaEditorial', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('linea_editorial_exposior_feria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LineaEditorialExposiorFeria';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'id_expositor_feria' => 'ForeignKey',
      'id_linea_editorial' => 'ForeignKey',
    );
  }
}
