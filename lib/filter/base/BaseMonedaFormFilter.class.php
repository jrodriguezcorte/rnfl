<?php

/**
 * Moneda filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseMonedaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'  => new sfWidgetFormFilterInput(),
      'simbolo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'  => new sfValidatorPass(array('required' => false)),
      'simbolo' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('moneda_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Moneda';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'nombre'  => 'Text',
      'simbolo' => 'Text',
    );
  }
}
