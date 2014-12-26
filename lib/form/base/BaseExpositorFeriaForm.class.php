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
      'id'                     => new sfWidgetFormInputHidden(),
      'id_feria'               => new sfWidgetFormPropelChoice(array('model' => 'Feria', 'add_empty' => true)),
      'id_expositor'           => new sfWidgetFormPropelChoice(array('model' => 'Expositor', 'add_empty' => true)),
      'nombe_empresa'          => new sfWidgetFormInputText(),
      'procedencia'            => new sfWidgetFormInputCheckbox(),
      'id_pais'                => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'ciudad'                 => new sfWidgetFormInputText(),
      'id_tipo_distribuidor'   => new sfWidgetFormPropelChoice(array('model' => 'TipoDistribuidor', 'add_empty' => true)),
      'sello_editorial'        => new sfWidgetFormInputText(),
      'direccion'              => new sfWidgetFormInputText(),
      'domicilio_fiscal'       => new sfWidgetFormInputText(),
      'telefono_local'         => new sfWidgetFormInputText(),
      'telefono_celular'       => new sfWidgetFormInputText(),
      'fax'                    => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'sitio_web'              => new sfWidgetFormInputText(),
      'nombre_director'        => new sfWidgetFormInputText(),
      'representante_legal'    => new sfWidgetFormInputText(),
      'nombre_ejecutivo_feria' => new sfWidgetFormInputText(),
      'contacto'               => new sfWidgetFormInputText(),
      'responsable_stand'      => new sfWidgetFormInputText(),
      'atencion_stand'         => new sfWidgetFormInputText(),
      'id_stand'               => new sfWidgetFormPropelChoice(array('model' => 'Stand', 'add_empty' => true)),
      'numero_titulos'         => new sfWidgetFormInputText(),
      'numero_novedades'       => new sfWidgetFormInputText(),
      'observaciones'          => new sfWidgetFormTextarea(),
      'id_usuario'             => new sfWidgetFormPropelChoice(array('model' => 'Usuario', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'ExpositorFeria', 'column' => 'id', 'required' => false)),
      'id_feria'               => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_expositor'           => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'nombe_empresa'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'procedencia'            => new sfValidatorBoolean(array('required' => false)),
      'id_pais'                => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'ciudad'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_tipo_distribuidor'   => new sfValidatorPropelChoice(array('model' => 'TipoDistribuidor', 'column' => 'id', 'required' => false)),
      'sello_editorial'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccion'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'domicilio_fiscal'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_local'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_celular'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sitio_web'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_director'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'representante_legal'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_ejecutivo_feria' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contacto'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'responsable_stand'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'atencion_stand'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_stand'               => new sfValidatorPropelChoice(array('model' => 'Stand', 'column' => 'id', 'required' => false)),
      'numero_titulos'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'numero_novedades'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'observaciones'          => new sfValidatorString(array('required' => false)),
      'id_usuario'             => new sfValidatorPropelChoice(array('model' => 'Usuario', 'column' => 'id', 'required' => false)),
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
