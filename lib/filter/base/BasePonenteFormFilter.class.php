<?php

/**
 * Ponente filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePonenteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'           => new sfWidgetFormFilterInput(),
      'apellido'         => new sfWidgetFormFilterInput(),
      'cedula'           => new sfWidgetFormFilterInput(),
      'rif'              => new sfWidgetFormFilterInput(),
      'sexo'             => new sfWidgetFormFilterInput(),
      'nacionalidad'     => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'telefono_local'   => new sfWidgetFormFilterInput(),
      'telefono_celular' => new sfWidgetFormFilterInput(),
      'email'            => new sfWidgetFormFilterInput(),
      'observaciones'    => new sfWidgetFormFilterInput(),
      'activo'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'nombre'           => new sfValidatorPass(array('required' => false)),
      'apellido'         => new sfValidatorPass(array('required' => false)),
      'cedula'           => new sfValidatorPass(array('required' => false)),
      'rif'              => new sfValidatorPass(array('required' => false)),
      'sexo'             => new sfValidatorPass(array('required' => false)),
      'nacionalidad'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'telefono_local'   => new sfValidatorPass(array('required' => false)),
      'telefono_celular' => new sfValidatorPass(array('required' => false)),
      'email'            => new sfValidatorPass(array('required' => false)),
      'observaciones'    => new sfValidatorPass(array('required' => false)),
      'activo'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('ponente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ponente';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nombre'           => 'Text',
      'apellido'         => 'Text',
      'cedula'           => 'Text',
      'rif'              => 'Text',
      'sexo'             => 'Text',
      'nacionalidad'     => 'ForeignKey',
      'telefono_local'   => 'Text',
      'telefono_celular' => 'Text',
      'email'            => 'Text',
      'observaciones'    => 'Text',
      'activo'           => 'Boolean',
    );
  }
}
