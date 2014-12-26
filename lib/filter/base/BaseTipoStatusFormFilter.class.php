<?php

/**
 * TipoStatus filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTipoStatusFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoStatus';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'nombre' => 'Text',
    );
  }
}
