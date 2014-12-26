<?php

/**
 * Status filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseStatusFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_feria'           => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'       => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_status'          => new sfWidgetFormPropelChoice(array('model' => 'TipoStatus', 'add_empty' => true)),
      'observaciones'      => new sfWidgetFormFilterInput(),
      'fecha'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_expositor_feria' => new sfWidgetFormPropelChoice(array('model' => 'ExpositorFeria', 'add_empty' => true)),
      'status_actual'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'id_pago_expositor'  => new sfWidgetFormPropelChoice(array('model' => 'PagoExpositor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_feria'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_expositor'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Expositor', 'column' => 'id')),
      'id_status'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoStatus', 'column' => 'id')),
      'observaciones'      => new sfValidatorPass(array('required' => false)),
      'fecha'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_expositor_feria' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ExpositorFeria', 'column' => 'id')),
      'status_actual'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'id_pago_expositor'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'PagoExpositor', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('status_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Status';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'id_feria'           => 'ForeignKey',
      'id_expositor'       => 'ForeignKey',
      'id_status'          => 'ForeignKey',
      'observaciones'      => 'Text',
      'fecha'              => 'Date',
      'id_expositor_feria' => 'ForeignKey',
      'status_actual'      => 'Boolean',
      'id_pago_expositor'  => 'ForeignKey',
    );
  }
}
