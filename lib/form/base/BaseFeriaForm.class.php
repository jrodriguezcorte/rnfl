<?php

/**
 * Feria form base class.
 *
 * @method Feria getObject() Returns the current form's model object
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFeriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'nombre'                  => new sfWidgetFormInputText(),
      'descripcion'             => new sfWidgetFormInputText(),
      'fecha_inicio'            => new sfWidgetFormDate(),
      'fecha_fin'               => new sfWidgetFormDate(),
      'id_pais'                 => new sfWidgetFormPropelChoice(array('model' => 'Pais', 'add_empty' => true)),
      'id_estado'               => new sfWidgetFormPropelChoice(array('model' => 'Estado', 'add_empty' => true)),
      'id_municipio'            => new sfWidgetFormPropelChoice(array('model' => 'Municipio', 'add_empty' => true)),
      'id_parroquia'            => new sfWidgetFormPropelChoice(array('model' => 'Parroquia', 'add_empty' => true)),
      'id_region'               => new sfWidgetFormPropelChoice(array('model' => 'Region', 'add_empty' => true)),
      'costo'                   => new sfWidgetFormInputText(),
      'libro_mas_vendido'       => new sfWidgetFormInputText(),
      'autor_libro_mas_vendido' => new sfWidgetFormInputText(),
      'extension_superficie'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorPropelChoice(array('model' => 'Feria', 'column' => 'id', 'required' => false)),
      'nombre'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descripcion'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fecha_inicio'            => new sfValidatorDate(array('required' => false)),
      'fecha_fin'               => new sfValidatorDate(array('required' => false)),
      'id_pais'                 => new sfValidatorPropelChoice(array('model' => 'Pais', 'column' => 'id', 'required' => false)),
      'id_estado'               => new sfValidatorPropelChoice(array('model' => 'Estado', 'column' => 'id', 'required' => false)),
      'id_municipio'            => new sfValidatorPropelChoice(array('model' => 'Municipio', 'column' => 'id', 'required' => false)),
      'id_parroquia'            => new sfValidatorPropelChoice(array('model' => 'Parroquia', 'column' => 'id', 'required' => false)),
      'id_region'               => new sfValidatorPropelChoice(array('model' => 'Region', 'column' => 'id', 'required' => false)),
      'costo'                   => new sfValidatorNumber(array('required' => false)),
      'libro_mas_vendido'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'autor_libro_mas_vendido' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'extension_superficie'    => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('feria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Feria';
  }


}