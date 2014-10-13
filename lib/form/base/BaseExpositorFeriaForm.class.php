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
      'nombre_director'        => new sfWidgetFormInputText(),
      'nombre_ejecutivo_feria' => new sfWidgetFormInputText(),
      'direccion'              => new sfWidgetFormInputText(),
      'ciudad'                 => new sfWidgetFormInputText(),
      'id_pais'                => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'telefono_local'         => new sfWidgetFormInputText(),
      'telefono_celular'       => new sfWidgetFormInputText(),
      'fax'                    => new sfWidgetFormInputText(),
      'email'                  => new sfWidgetFormInputText(),
      'sitio_web'              => new sfWidgetFormInputText(),
      'tipo_expositor'         => new sfWidgetFormInputText(),
      'otro_tipo_expositor'    => new sfWidgetFormInputText(),
      'numero_stand'           => new sfWidgetFormInputText(),
      'costo_stand'            => new sfWidgetFormInputText(),
      'metros_stand'           => new sfWidgetFormInputText(),
      'otro_linea_editorial'   => new sfWidgetFormInputText(),
      'libro_mas_vendido'      => new sfWidgetFormInputText(),
      'costo_libro'            => new sfWidgetFormInputText(),
      'cantidad_libro_vendido' => new sfWidgetFormInputText(),
      'observaciones'          => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'ExpositorFeria', 'column' => 'id', 'required' => false)),
      'id_feria'               => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'id_expositor'           => new sfValidatorPropelChoice(array('model' => 'Expositor', 'column' => 'id', 'required' => false)),
      'nombe_empresa'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_director'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombre_ejecutivo_feria' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'direccion'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ciudad'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_pais'                => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'telefono_local'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono_celular'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sitio_web'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo_expositor'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'otro_tipo_expositor'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'numero_stand'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'costo_stand'            => new sfValidatorNumber(array('required' => false)),
      'metros_stand'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'otro_linea_editorial'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'libro_mas_vendido'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'costo_libro'            => new sfValidatorNumber(array('required' => false)),
      'cantidad_libro_vendido' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'observaciones'          => new sfValidatorString(array('required' => false)),
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
