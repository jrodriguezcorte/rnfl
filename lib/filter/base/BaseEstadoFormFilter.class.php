<?php

/**
 * Estado filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseEstadoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'  => new sfWidgetFormFilterInput(),
      'id_pais' => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'  => new sfValidatorPass(array('required' => false)),
      'id_pais' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('estado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estado';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'nombre'  => 'Text',
      'id_pais' => 'ForeignKey',
    );
  }
}
