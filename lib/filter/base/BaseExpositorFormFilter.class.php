<?php

/**
 * Expositor filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseExpositorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'   => new sfWidgetFormFilterInput(),
      'apellido' => new sfWidgetFormFilterInput(),
      'cedula'   => new sfWidgetFormFilterInput(),
      'rif'      => new sfWidgetFormFilterInput(),
      'id_pais'  => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'   => new sfValidatorPass(array('required' => false)),
      'apellido' => new sfValidatorPass(array('required' => false)),
      'cedula'   => new sfValidatorPass(array('required' => false)),
      'rif'      => new sfValidatorPass(array('required' => false)),
      'id_pais'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('expositor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Expositor';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'nombre'   => 'Text',
      'apellido' => 'Text',
      'cedula'   => 'Text',
      'rif'      => 'Text',
      'id_pais'  => 'ForeignKey',
    );
  }
}
