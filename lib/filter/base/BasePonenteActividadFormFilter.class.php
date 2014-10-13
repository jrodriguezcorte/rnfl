<?php

/**
 * PonenteActividad filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePonenteActividadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ponente'   => new sfWidgetFormPropelChoice(array('model' => 'Ponente', 'add_empty' => true)),
      'id_actividad' => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_feria'     => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_ponente'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Ponente', 'column' => 'id')),
      'id_actividad' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Actividad', 'column' => 'id')),
      'id_feria'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ponente_actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PonenteActividad';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'id_ponente'   => 'ForeignKey',
      'id_actividad' => 'ForeignKey',
      'id_feria'     => 'ForeignKey',
    );
  }
}
