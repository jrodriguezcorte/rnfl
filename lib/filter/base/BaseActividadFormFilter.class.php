<?php

/**
 * Actividad filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseActividadFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha_sugerida'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora'                  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_feria'              => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_usuario'            => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'stand_numero'          => new sfWidgetFormFilterInput(),
      'nombre_empresa'        => new sfWidgetFormFilterInput(),
      'direccion'             => new sfWidgetFormFilterInput(),
      'nombre_solicitante'    => new sfWidgetFormFilterInput(),
      'nombre_representante'  => new sfWidgetFormFilterInput(),
      'telefono_local'        => new sfWidgetFormFilterInput(),
      'telefono_celular'      => new sfWidgetFormFilterInput(),
      'fax'                   => new sfWidgetFormFilterInput(),
      'email'                 => new sfWidgetFormFilterInput(),
      'id_tipo_actividad'     => new sfWidgetFormPropelChoice(array('model' => 'TipoActividad', 'add_empty' => true)),
      'titulo'                => new sfWidgetFormFilterInput(),
      'autor'                 => new sfWidgetFormFilterInput(),
      'editorial'             => new sfWidgetFormFilterInput(),
      'descripcion_actividad' => new sfWidgetFormFilterInput(),
      'presente_autor'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'publico_dirigido'      => new sfWidgetFormFilterInput(),
      'numero_ponentes'       => new sfWidgetFormFilterInput(),
      'actividad_cerrada'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'fecha_sugerida'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'hora'                  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'id_feria'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Feria', 'column' => 'id')),
      'id_usuario'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Usuario', 'column' => 'id')),
      'stand_numero'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre_empresa'        => new sfValidatorPass(array('required' => false)),
      'direccion'             => new sfValidatorPass(array('required' => false)),
      'nombre_solicitante'    => new sfValidatorPass(array('required' => false)),
      'nombre_representante'  => new sfValidatorPass(array('required' => false)),
      'telefono_local'        => new sfValidatorPass(array('required' => false)),
      'telefono_celular'      => new sfValidatorPass(array('required' => false)),
      'fax'                   => new sfValidatorPass(array('required' => false)),
      'email'                 => new sfValidatorPass(array('required' => false)),
      'id_tipo_actividad'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TipoActividad', 'column' => 'id')),
      'titulo'                => new sfValidatorPass(array('required' => false)),
      'autor'                 => new sfValidatorPass(array('required' => false)),
      'editorial'             => new sfValidatorPass(array('required' => false)),
      'descripcion_actividad' => new sfValidatorPass(array('required' => false)),
      'presente_autor'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'publico_dirigido'      => new sfValidatorPass(array('required' => false)),
      'numero_ponentes'       => new sfValidatorPass(array('required' => false)),
      'actividad_cerrada'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('actividad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Actividad';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'fecha_sugerida'        => 'Date',
      'hora'                  => 'Date',
      'id_feria'              => 'ForeignKey',
      'id_usuario'            => 'ForeignKey',
      'stand_numero'          => 'Number',
      'nombre_empresa'        => 'Text',
      'direccion'             => 'Text',
      'nombre_solicitante'    => 'Text',
      'nombre_representante'  => 'Text',
      'telefono_local'        => 'Text',
      'telefono_celular'      => 'Text',
      'fax'                   => 'Text',
      'email'                 => 'Text',
      'id_tipo_actividad'     => 'ForeignKey',
      'titulo'                => 'Text',
      'autor'                 => 'Text',
      'editorial'             => 'Text',
      'descripcion_actividad' => 'Text',
      'presente_autor'        => 'Boolean',
      'publico_dirigido'      => 'Text',
      'numero_ponentes'       => 'Text',
      'actividad_cerrada'     => 'Boolean',
    );
  }
}
