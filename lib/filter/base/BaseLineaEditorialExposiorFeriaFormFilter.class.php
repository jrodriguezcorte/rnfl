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
      'id_expositor_feria' => new sfWidgetFormFilterInput(),
      'id_linea_editorial' => new sfWidgetFormPropelChoice(array('model' => 'LineaEditorial', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_expositor_feria' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'id_expositor_feria' => 'Number',
      'id_linea_editorial' => 'ForeignKey',
    );
  }
}
