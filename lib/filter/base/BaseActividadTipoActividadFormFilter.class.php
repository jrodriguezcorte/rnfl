<?php

/**
 * ActividadTipoActividad filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseActividadTipoActividadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_actividad'      => new sfWidgetFormPropelChoice(array('model' => 'Actividad', 'add_empty' => true)),
      'id_tipo_actividad' => new sfWidgetFormPropelChoice(array('model' => 'TipoActividad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_actividad'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Actividad', 'column' => 'id')),
      'id_tipo_actividad' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoActividad', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('actividad_tipo_actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActividadTipoActividad';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'id_actividad'      => 'ForeignKey',
      'id_tipo_actividad' => 'ForeignKey',
    );
  }
}
