<?php

/**
 * PagoExpositor filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePagoExpositorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'monto'                  => new sfWidgetFormFilterInput(),
      'id_feria'               => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'           => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_usuario'             => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'id_expositor_feria'     => new sfWidgetFormPropelChoice(array('model' => 'ExpositorFeria', 'add_empty' => true)),
      'status_actual'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pago_aprobado'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'fecha'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_banco'               => new sfWidgetFormPropelChoice(array('model' => 'Banco', 'add_empty' => true)),
      'numero_deposito'        => new sfWidgetFormFilterInput(),
      'fecha_pago'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'es_pago_banco_nacional' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'monto'                  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'id_feria'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_expositor'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Expositor', 'column' => 'id')),
      'id_usuario'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'id_expositor_feria'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ExpositorFeria', 'column' => 'id')),
      'status_actual'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pago_aprobado'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'fecha'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_banco'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Banco', 'column' => 'id')),
      'numero_deposito'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_pago'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'es_pago_banco_nacional' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('pago_expositor_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'PagoExpositor';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'monto'                  => 'Number',
      'id_feria'               => 'ForeignKey',
      'id_expositor'           => 'ForeignKey',
      'id_usuario'             => 'ForeignKey',
      'id_expositor_feria'     => 'ForeignKey',
      'status_actual'          => 'Boolean',
      'pago_aprobado'          => 'Boolean',
      'fecha'                  => 'Date',
      'id_banco'               => 'ForeignKey',
      'numero_deposito'        => 'Number',
      'fecha_pago'             => 'Date',
      'es_pago_banco_nacional' => 'Boolean',
    );
  }
}
