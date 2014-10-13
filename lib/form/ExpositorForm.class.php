<?php

/**
 * Expositor form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
class ExpositorForm extends BaseExpositorForm
{
  public function configure()
  {
    $this->setValidators(array(
            'nombre' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'apellido' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'cedula' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'rif' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'id_pais'  => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
     ));
    
    
    $this->widgetSchema['cedula'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el formato: V-12345678'));
    $this->widgetSchema['rif'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el formato: J-12345678'));

    $this->widgetSchema->setLabel('nombre', 'Nombre <font color="red">*</font>');
    $this->widgetSchema->setLabel('apellido', 'Apellido <font color="red">*</font>');
    $this->widgetSchema->setLabel('cedula', 'Cédula <font color="red">*</font>');
    $this->widgetSchema->setLabel('rif', 'RIF <font color="red">*</font>');
    $this->widgetSchema->setLabel('id_pais', 'País <font color="red">*</font>');       
  }
}
