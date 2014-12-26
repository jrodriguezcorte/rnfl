<?php

/**
 * Feria filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFeriaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                      => new sfWidgetFormFilterInput(),
      'lema'                        => new sfWidgetFormFilterInput(),
      'tema'                        => new sfWidgetFormFilterInput(),
      'id_tipo_feria'               => new sfWidgetFormPropelChoice(array('model' => 'TipoFeria', 'add_empty' => true)),
      'id_pais_homenajeado'         => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'escritor_homenajeado'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'nombre_escritor_homenajeado' => new sfWidgetFormFilterInput(),
      'fecha_inicio'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_fin'                   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora_inicio'                 => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora_fin'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_pais'                     => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'id_estado'                   => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
      'id_municipio'                => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => true)),
      'id_parroquia'                => new sfWidgetFormPropelChoice(array('model' => 'Parroquia', 'add_empty' => true)),
      'id_region'                   => new sfWidgetFormPropelChoice(array('model' => 'Region', 'add_empty' => true)),
      'direccion'                   => new sfWidgetFormFilterInput(),
      'extension_superficie'        => new sfWidgetFormFilterInput(),
      'libro_mas_vendido'           => new sfWidgetFormFilterInput(),
      'autor_libro_mas_vendido'     => new sfWidgetFormFilterInput(),
      'costo'                       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'                      => new sfValidatorPass(array('required' => false)),
      'lema'                        => new sfValidatorPass(array('required' => false)),
      'tema'                        => new sfValidatorPass(array('required' => false)),
      'id_tipo_feria'               => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoFeria', 'column' => 'id')),
      'id_pais_homenajeado'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'escritor_homenajeado'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'nombre_escritor_homenajeado' => new sfValidatorPass(array('required' => false)),
      'fecha_inicio'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_fin'                   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora_inicio'                 => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora_fin'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_pais'                     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Pais', 'column' => 'id')),
      'id_estado'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Estado', 'column' => 'id')),
      'id_municipio'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Municipio', 'column' => 'id')),
      'id_parroquia'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Parroquia', 'column' => 'id')),
      'id_region'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Region', 'column' => 'id')),
      'direccion'                   => new sfValidatorPass(array('required' => false)),
      'extension_superficie'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'libro_mas_vendido'           => new sfValidatorPass(array('required' => false)),
      'autor_libro_mas_vendido'     => new sfValidatorPass(array('required' => false)),
      'costo'                       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('feria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Feria';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'nombre'                      => 'Text',
      'lema'                        => 'Text',
      'tema'                        => 'Text',
      'id_tipo_feria'               => 'ForeignKey',
      'id_pais_homenajeado'         => 'ForeignKey',
      'escritor_homenajeado'        => 'Boolean',
      'nombre_escritor_homenajeado' => 'Text',
      'fecha_inicio'                => 'Date',
      'fecha_fin'                   => 'Date',
      'hora_inicio'                 => 'Date',
      'hora_fin'                    => 'Date',
      'id_pais'                     => 'ForeignKey',
      'id_estado'                   => 'ForeignKey',
      'id_municipio'                => 'ForeignKey',
      'id_parroquia'                => 'ForeignKey',
      'id_region'                   => 'ForeignKey',
      'direccion'                   => 'Text',
      'extension_superficie'        => 'Number',
      'libro_mas_vendido'           => 'Text',
      'autor_libro_mas_vendido'     => 'Text',
      'costo'                       => 'Number',
    );
  }
}
