<?php

/**
 * Usuario filter form base class.
 *
 * @package    rnfl
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'              => new sfWidgetFormFilterInput(),
      'apellido'            => new sfWidgetFormFilterInput(),
      'cedula'              => new sfWidgetFormFilterInput(),
      'isbn'                => new sfWidgetFormFilterInput(),
      'login'               => new sfWidgetFormFilterInput(),
      'contrasena'          => new sfWidgetFormFilterInput(),
      'sf_guard_user'       => new sfWidgetFormFilterInput(),
      'sexo'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sf_guard_user_group' => new sfWidgetFormFilterInput(),
      'tipo_organizador'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'ente_organizador'    => new sfWidgetFormFilterInput(),
      'sector'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'unidad_responsable'  => new sfWidgetFormFilterInput(),
      'correo'              => new sfWidgetFormFilterInput(),
      'telefono'            => new sfWidgetFormFilterInput(),
      'activo'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'nombre'              => new sfValidatorPass(array('required' => false)),
      'apellido'            => new sfValidatorPass(array('required' => false)),
      'cedula'              => new sfValidatorPass(array('required' => false)),
      'isbn'                => new sfValidatorPass(array('required' => false)),
      'login'               => new sfValidatorPass(array('required' => false)),
      'contrasena'          => new sfValidatorPass(array('required' => false)),
      'sf_guard_user'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sexo'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sf_guard_user_group' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tipo_organizador'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'ente_organizador'    => new sfValidatorPass(array('required' => false)),
      'sector'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'unidad_responsable'  => new sfValidatorPass(array('required' => false)),
      'correo'              => new sfValidatorPass(array('required' => false)),
      'telefono'            => new sfValidatorPass(array('required' => false)),
      'activo'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'nombre'              => 'Text',
      'apellido'            => 'Text',
      'cedula'              => 'Text',
      'isbn'                => 'Text',
      'login'               => 'Text',
      'contrasena'          => 'Text',
      'sf_guard_user'       => 'Number',
      'sexo'                => 'Boolean',
      'sf_guard_user_group' => 'Number',
      'tipo_organizador'    => 'Boolean',
      'ente_organizador'    => 'Text',
      'sector'              => 'Boolean',
      'unidad_responsable'  => 'Text',
      'correo'              => 'Text',
      'telefono'            => 'Text',
      'activo'              => 'Boolean',
    );
  }
}
