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
      'correo'              => new sfWidgetFormFilterInput(),
      'telefono'            => new sfWidgetFormFilterInput(),
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
      'correo'              => new sfValidatorPass(array('required' => false)),
      'telefono'            => new sfValidatorPass(array('required' => false)),
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
      'correo'              => 'Text',
      'telefono'            => 'Text',
    );
  }
}
