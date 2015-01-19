<?php

/**
 * Banco filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseBancoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'      => new sfWidgetFormFilterInput(),
      'es_nacional' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'id_feria'    => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_pais'     => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'id_moneda'   => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'      => new sfValidatorPass(array('required' => false)),
      'es_nacional' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'id_feria'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_pais'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'id_moneda'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Moneda', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('banco_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banco';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'nombre'      => 'Text',
      'es_nacional' => 'Boolean',
      'id_feria'    => 'ForeignKey',
      'id_pais'     => 'ForeignKey',
      'id_moneda'   => 'ForeignKey',
    );
  }
}
