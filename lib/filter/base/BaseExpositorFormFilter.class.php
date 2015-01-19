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
      'nombre'                 => new sfWidgetFormFilterInput(),
      'apellido'               => new sfWidgetFormFilterInput(),
      'rif'                    => new sfWidgetFormFilterInput(),
      'id_pais'                => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'nombre_empresa'         => new sfWidgetFormFilterInput(),
      'nombre_director'        => new sfWidgetFormFilterInput(),
      'nombre_ejecutivo_feria' => new sfWidgetFormFilterInput(),
      'direccion'              => new sfWidgetFormFilterInput(),
      'ciudad'                 => new sfWidgetFormFilterInput(),
      'telefono_local'         => new sfWidgetFormFilterInput(),
      'telefono_celular'       => new sfWidgetFormFilterInput(),
      'fax'                    => new sfWidgetFormFilterInput(),
      'email'                  => new sfWidgetFormFilterInput(),
      'sitio_web'              => new sfWidgetFormFilterInput(),
      'es_venezolano'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'nombre'                 => new sfValidatorPass(array('required' => false)),
      'apellido'               => new sfValidatorPass(array('required' => false)),
      'rif'                    => new sfValidatorPass(array('required' => false)),
      'id_pais'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'nombre_empresa'         => new sfValidatorPass(array('required' => false)),
      'nombre_director'        => new sfValidatorPass(array('required' => false)),
      'nombre_ejecutivo_feria' => new sfValidatorPass(array('required' => false)),
      'direccion'              => new sfValidatorPass(array('required' => false)),
      'ciudad'                 => new sfValidatorPass(array('required' => false)),
      'telefono_local'         => new sfValidatorPass(array('required' => false)),
      'telefono_celular'       => new sfValidatorPass(array('required' => false)),
      'fax'                    => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'sitio_web'              => new sfValidatorPass(array('required' => false)),
      'es_venezolano'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
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
      'id'                     => 'Number',
      'nombre'                 => 'Text',
      'apellido'               => 'Text',
      'rif'                    => 'Text',
      'id_pais'                => 'ForeignKey',
      'nombre_empresa'         => 'Text',
      'nombre_director'        => 'Text',
      'nombre_ejecutivo_feria' => 'Text',
      'direccion'              => 'Text',
      'ciudad'                 => 'Text',
      'telefono_local'         => 'Text',
      'telefono_celular'       => 'Text',
      'fax'                    => 'Text',
      'email'                  => 'Text',
      'sitio_web'              => 'Text',
      'es_venezolano'          => 'Boolean',
    );
  }
}
