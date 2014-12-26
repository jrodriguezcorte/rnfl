<?php

/**
 * TipoDistribuidor filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTipoDistribuidorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_distribuidor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoDistribuidor';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'nombre' => 'Text',
    );
  }
}
