<?php

/**
 * FeriaSelloeditorial filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFeriaSelloeditorialFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_feria'          => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_selloeditorial' => new sfWidgetFormPropelChoice(array('model' => 'SelloEditorial', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_feria'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_selloeditorial' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'SelloEditorial', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('feria_selloeditorial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'FeriaSelloeditorial';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_feria'          => 'ForeignKey',
      'id_selloeditorial' => 'ForeignKey',
    );
  }
}
