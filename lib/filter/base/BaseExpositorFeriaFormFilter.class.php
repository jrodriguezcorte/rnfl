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
      'nombre_director'        => new sfWidgetFormFilterInput(),
      'nombre_ejecutivo_feria' => new sfWidgetFormFilterInput(),
      'direccion'              => new sfWidgetFormFilterInput(),
      'ciudad'                 => new sfWidgetFormFilterInput(),
      'id_pais'                => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'telefono_local'         => new sfWidgetFormFilterInput(),
      'telefono_celular'       => new sfWidgetFormFilterInput(),
      'fax'                    => new sfWidgetFormFilterInput(),
      'email'                  => new sfWidgetFormFilterInput(),
      'sitio_web'              => new sfWidgetFormFilterInput(),
      'tipo_expositor'         => new sfWidgetFormFilterInput(),
      'otro_tipo_expositor'    => new sfWidgetFormFilterInput(),
      'numero_stand'           => new sfWidgetFormFilterInput(),
      'costo_stand'            => new sfWidgetFormFilterInput(),
      'metros_stand'           => new sfWidgetFormFilterInput(),
      'otro_linea_editorial'   => new sfWidgetFormFilterInput(),
      'libro_mas_vendido'      => new sfWidgetFormFilterInput(),
      'costo_libro'            => new sfWidgetFormFilterInput(),
      'cantidad_libro_vendido' => new sfWidgetFormFilterInput(),
      'observaciones'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_feria'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_expositor'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Expositor', 'column' => 'id')),
      'nombe_empresa'          => new sfValidatorPass(array('required' => false)),
      'nombre_director'        => new sfValidatorPass(array('required' => false)),
      'nombre_ejecutivo_feria' => new sfValidatorPass(array('required' => false)),
      'direccion'              => new sfValidatorPass(array('required' => false)),
      'ciudad'                 => new sfValidatorPass(array('required' => false)),
      'id_pais'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'telefono_local'         => new sfValidatorPass(array('required' => false)),
      'telefono_celular'       => new sfValidatorPass(array('required' => false)),
      'fax'                    => new sfValidatorPass(array('required' => false)),
      'email'                  => new sfValidatorPass(array('required' => false)),
      'sitio_web'              => new sfValidatorPass(array('required' => false)),
      'tipo_expositor'         => new sfValidatorPass(array('required' => false)),
      'otro_tipo_expositor'    => new sfValidatorPass(array('required' => false)),
      'numero_stand'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'costo_stand'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'metros_stand'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'otro_linea_editorial'   => new sfValidatorPass(array('required' => false)),
      'libro_mas_vendido'      => new sfValidatorPass(array('required' => false)),
      'costo_libro'            => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cantidad_libro_vendido' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observaciones'          => new sfValidatorPass(array('required' => false)),
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
      'nombre_director'        => 'Text',
      'nombre_ejecutivo_feria' => 'Text',
      'direccion'              => 'Text',
      'ciudad'                 => 'Text',
      'id_pais'                => 'ForeignKey',
      'telefono_local'         => 'Text',
      'telefono_celular'       => 'Text',
      'fax'                    => 'Text',
      'email'                  => 'Text',
      'sitio_web'              => 'Text',
      'tipo_expositor'         => 'Text',
      'otro_tipo_expositor'    => 'Text',
      'numero_stand'           => 'Number',
      'costo_stand'            => 'Number',
      'metros_stand'           => 'Number',
      'otro_linea_editorial'   => 'Text',
      'libro_mas_vendido'      => 'Text',
      'costo_libro'            => 'Number',
      'cantidad_libro_vendido' => 'Number',
      'observaciones'          => 'Text',
    );
  }
}
