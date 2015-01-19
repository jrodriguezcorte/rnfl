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
            'rif' => new sfValidatorString(array('required' => false)),
            'id_pais'  => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'nombre_empresa' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'nombre_director' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'nombre_ejecutivo_feria' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'direccion' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'ciudad' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'telefono_local' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'telefono_celular' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'fax' => new sfValidatorString(array('required' => false)),
            'email' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'sitio_web' => new sfValidatorString(array('required' => false)),
            'es_venezolano'  => new sfValidatorString(array('required' => false)),    
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
     ));
    
    
    $this->widgetSchema['rif'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el formato: J12345678'));
    $this->widgetSchema['telefono_local'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el formato: 0000-0000000'));
    $this->widgetSchema['telefono_celular'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el formato: 0000-0000000'));

    $this->getWidgetSchema()->moveField('es_venezolano', sfWidgetFormSchema::AFTER, 'apellido');
    
    $this->widgetSchema->setLabel('nombre', 'Nombre <font color="red">*</font>');
    $this->widgetSchema->setLabel('apellido', 'Apellido <font color="red">*</font>');
    $this->widgetSchema->setLabel('rif', 'RIF <font color="red">*</font>');
    $this->widgetSchema->setLabel('id_pais', 'País <font color="red">*</font>'); 
        $this->widgetSchema->setLabel('nombre_empresa', 'Nombre de la Empresa <font color="red">*</font>');
        $this->widgetSchema->setLabel('nombre_director', 'Nombre del Director <font color="red">*</font>');
        $this->widgetSchema->setLabel('nombre_ejecutivo_feria', 'Nombre del Ejecutivo de Ventas <font color="red">*</font>');
        $this->widgetSchema->setLabel('direccion', 'Dirección <font color="red">*</font>');
        $this->widgetSchema->setLabel('ciudad', 'Ciudad <font color="red">*</font>');
        $this->widgetSchema->setLabel('telefono_local', 'Teléfono Local <font color="red">*</font>');
        $this->widgetSchema->setLabel('telefono_celular', 'Teléfono Celular <font color="red">*</font>');
        $this->widgetSchema->setLabel('fax', 'Fax');
        $this->widgetSchema->setLabel('email', 'Correo electrónico <font color="red">*</font>');
        $this->widgetSchema->setLabel('sitio_web', 'Sitio Web');
        $this->widgetSchema->setLabel('es_venezolano', '¿Es un expositor venezolano?');
  
  }
}
