<?php

/**
 * ExpositorFeria form base class.
 *
 * @method ExpositorFeria getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseExpositorFeriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'id_feria'             => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'         => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'id_tipo_distribuidor' => new sfWidgetFormPropelChoice(array('model' => 'TipoDistribuidor', 'add_empty' => true)),
      'sello_editorial'      => new sfWidgetFormInputText(),
      'domicilio_fiscal'     => new sfWidgetFormInputText(),
      'responsable_stand'    => new sfWidgetFormInputText(),
      'id_stand'             => new sfWidgetFormPropelChoice(array('model' => 'Stand', 'add_empty' => true)),
      'numero_titulos'       => new sfWidgetFormInputText(),
      'numero_novedades'     => new sfWidgetFormInputText(),
      'observaciones'        => new sfWidgetFormTextarea(),
      'id_usuario'           => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
      'nombre_cenefa'        => new sfWidgetFormInputText(),
      'activo'               => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'ExpositorFeria', 'column' => 'id', 'required' => false)),
      'id_feria'             => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_expositor'         => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'id_tipo_distribuidor' => new sfValidatorPropelChoice(array('model' => 'TipoDistribuidor', 'column' => 'id', 'required' => false)),
      'sello_editorial'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'domicilio_fiscal'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'responsable_stand'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_stand'             => new sfValidatorPropelChoice(array('model' => 'Stand', 'column' => 'id', 'required' => false)),
      'numero_titulos'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'numero_novedades'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'observaciones'        => new sfValidatorString(array('required' => false)),
      'id_usuario'           => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
      'nombre_cenefa'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'activo'               => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('expositor_feria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExpositorFeria';
  }


}
