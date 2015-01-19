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
      'id_feria'             => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'         => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_tipo_distribuidor' => new sfWidgetFormPropelChoice(array('model' => 'TipoDistribuidor', 'add_empty' => true)),
      'sello_editorial'      => new sfWidgetFormFilterInput(),
      'domicilio_fiscal'     => new sfWidgetFormFilterInput(),
      'responsable_stand'    => new sfWidgetFormFilterInput(),
      'id_stand'             => new sfWidgetFormPropelChoice(array('model' => 'Stand', 'add_empty' => true)),
      'numero_titulos'       => new sfWidgetFormFilterInput(),
      'numero_novedades'     => new sfWidgetFormFilterInput(),
      'observaciones'        => new sfWidgetFormFilterInput(),
      'id_usuario'           => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'nombre_cenefa'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_feria'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_expositor'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Expositor', 'column' => 'id')),
      'id_tipo_distribuidor' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoDistribuidor', 'column' => 'id')),
      'sello_editorial'      => new sfValidatorPass(array('required' => false)),
      'domicilio_fiscal'     => new sfValidatorPass(array('required' => false)),
      'responsable_stand'    => new sfValidatorPass(array('required' => false)),
      'id_stand'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Stand', 'column' => 'id')),
      'numero_titulos'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_novedades'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observaciones'        => new sfValidatorPass(array('required' => false)),
      'id_usuario'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'nombre_cenefa'        => new sfValidatorPass(array('required' => false)),
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
      'id'                   => 'Number',
      'id_feria'             => 'ForeignKey',
      'id_expositor'         => 'ForeignKey',
      'id_tipo_distribuidor' => 'ForeignKey',
      'sello_editorial'      => 'Text',
      'domicilio_fiscal'     => 'Text',
      'responsable_stand'    => 'Text',
      'id_stand'             => 'ForeignKey',
      'numero_titulos'       => 'Number',
      'numero_novedades'     => 'Number',
      'observaciones'        => 'Text',
      'id_usuario'           => 'ForeignKey',
      'nombre_cenefa'        => 'Text',
    );
  }
}
