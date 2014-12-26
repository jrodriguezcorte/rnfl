<?php

/**
 * TipoFeria filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTipoFeriaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_feria' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tipo_feria' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_feria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoFeria';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'tipo_feria' => 'Text',
    );
  }
}
