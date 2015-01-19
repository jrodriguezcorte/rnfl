<?php

/**
 * Cuenta filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCuentaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_banco'     => new sfWidgetFormPropelChoice(array('model' => 'Banco', 'add_empty' => true)),
      'swift'        => new sfWidgetFormFilterInput(),
      'aba'          => new sfWidgetFormFilterInput(),
      'beneficiario' => new sfWidgetFormFilterInput(),
      'id_feria'     => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'numero'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_banco'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Banco', 'column' => 'id')),
      'swift'        => new sfValidatorPass(array('required' => false)),
      'aba'          => new sfValidatorPass(array('required' => false)),
      'beneficiario' => new sfValidatorPass(array('required' => false)),
      'id_feria'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'numero'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cuenta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cuenta';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'id_banco'     => 'ForeignKey',
      'swift'        => 'Text',
      'aba'          => 'Text',
      'beneficiario' => 'Text',
      'id_feria'     => 'ForeignKey',
      'numero'       => 'Text',
    );
  }
}
