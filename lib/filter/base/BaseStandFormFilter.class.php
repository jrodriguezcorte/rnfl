<?php

/**
 * Stand filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseStandFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_feria' => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'metros'   => new sfWidgetFormFilterInput(),
      'costo_bs' => new sfWidgetFormFilterInput(),
      'costo_ds' => new sfWidgetFormFilterInput(),
      'activo'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_feria' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'metros'   => new sfValidatorPass(array('required' => false)),
      'costo_bs' => new sfValidatorPass(array('required' => false)),
      'costo_ds' => new sfValidatorPass(array('required' => false)),
      'activo'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('stand_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Stand';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'id_feria' => 'ForeignKey',
      'metros'   => 'Text',
      'costo_bs' => 'Text',
      'costo_ds' => 'Text',
      'activo'   => 'Boolean',
    );
  }
}
