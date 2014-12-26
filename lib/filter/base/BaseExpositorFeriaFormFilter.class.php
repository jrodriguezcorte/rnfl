<?php

/**
 * ExpositorFeria filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseExpositorFeriaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_feria'               => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'           => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'nombe_empresa'          => new sfWidgetFormFilterInput(),
      'procedencia'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'id_pais'                => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'ciudad'                 => new sfWidgetFormFilterInput(),
      'id_tipo_distribuidor'   => new sfWidgetFormPropelChoice(array('model' => 'TipoDistribuidor', 'add_empty' => true)),
      'sello_editorial'        => new sfWidgetFormFilterInput(),
      'direccion'              => new sfWidgetFormFilterInput(),
      'domicilio_fiscal'       => new sfWidgetFormFilterInput(),
      'telefono_local'         => new sfWidgetFormFilterInput(),
      'telefono_celular'       => new sfWidgetFormFilterInput(),
      'fax'                    => new sfWidgetFormFilterInput(),
      'email'                  => new sfWidgetFormFilterInput(),
      'sitio_web'              => new sfWidgetFormFilterInput(),
      'nombre_director'        => new sfWidgetFormFilterInput(),
      'representante_legal'    => new sfWidgetFormFilterInput(),
      'nombre_ejecutivo_feria' => new sfWidgetFormFilterInput(),
      'contacto'               => new sfWidgetFormFilterInput(),
      'responsable_stand'      => new sfWidgetFormFilterInput(),
      'atencion_stand'         => new sfWidgetFormFilterInput(),
      'id_stand'               => new sfWidgetFormPropelChoice(array('model' => 'Stand', 'add_empty' => true)),
      'numero_titulos'         => new sfWidgetFormFilterInput(),
      'numero_novedades'       => new sfWidgetFormFilterInput(),
      'observaciones'          => new sfWidgetFormFilterInput(),
      'id_usuario'             => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_feria'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_expositor'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Expositor', 'column' => 'id')),
      'nombe_empresa'          => new sfValidatorPass(array('required' => false)),
      'procedencia'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'id_pais'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'ciudad'                 => new sfValidatorPass(array('required' => false)),
      'id_tipo_distribuidor'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoDistribuidor', 'column' => 'id')),
      'sello_editorial'        => new sfValidatorPass(array('required' => false)),
      'direccion'              => new sfValidatorPass(array('required' => false)),
      'domicilio_fiscal'       => new sfValidatorPass(array('required' => false)),
      'telefono_local'         => new sfValidatorPass(array('required' => false)),
      'telefono_celular'       => new sfValidatorPass(array('required' => false)),
      'fax'                    => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'sitio_web'              => new sfValidatorPass(array('required' => false)),
      'nombre_director'        => new sfValidatorPass(array('required' => false)),
      'representante_legal'    => new sfValidatorPass(array('required' => false)),
      'nombre_ejecutivo_feria' => new sfValidatorPass(array('required' => false)),
      'contacto'               => new sfValidatorPass(array('required' => false)),
      'responsable_stand'      => new sfValidatorPass(array('required' => false)),
      'atencion_stand'         => new sfValidatorPass(array('required' => false)),
      'id_stand'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Stand', 'column' => 'id')),
      'numero_titulos'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_novedades'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observaciones'          => new sfValidatorPass(array('required' => false)),
      'id_usuario'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('expositor_feria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExpositorFeria';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'id_feria'               => 'ForeignKey',
      'id_expositor'           => 'ForeignKey',
      'nombe_empresa'          => 'Text',
      'procedencia'            => 'Boolean',
      'id_pais'                => 'ForeignKey',
      'ciudad'                 => 'Text',
      'id_tipo_distribuidor'   => 'ForeignKey',
      'sello_editorial'        => 'Text',
      'direccion'              => 'Text',
      'domicilio_fiscal'       => 'Text',
      'telefono_local'         => 'Text',
      'telefono_celular'       => 'Text',
      'fax'                    => 'Text',
      'email'                  => 'Text',
      'sitio_web'              => 'Text',
      'nombre_director'        => 'Text',
      'representante_legal'    => 'Text',
      'nombre_ejecutivo_feria' => 'Text',
      'contacto'               => 'Text',
      'responsable_stand'      => 'Text',
      'atencion_stand'         => 'Text',
      'id_stand'               => 'ForeignKey',
      'numero_titulos'         => 'Number',
      'numero_novedades'       => 'Number',
      'observaciones'          => 'Text',
      'id_usuario'             => 'ForeignKey',
    );
  }
}
