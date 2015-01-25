<?php

/**
 * Ponente form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
class PonenteForm extends BasePonenteForm
{
  protected static $sexo = array('Masculino' => 'Masculino', 'Femenino' => 'Femenino');  
    
  public function configure()
  {
      
        $this->widgetSchema['observaciones'] = new sfWidgetFormTextareaTinyMCE(array(
            'width' => 600,
            'height' => 200,
            'config' => 'theme_advanced_disable: "anchor,image,cleanup,help,code",
             theme_advanced_buttons1 : "bold,italic,separator,bullist,separator,link, sub,sup,separator,charmap,separator,numlist,separator,outdent,indent,separator,undo,redo,separator,unlink,separator,hr,removeformat",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_buttons4: "",theme_advanced_path : false,',
        ));
        ;
        
    $this->setValidators(array(
            'nombre' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'apellido' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'cedula' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'rif' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'nacionalidad'  => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'sexo'  => new sfValidatorString(array('required' => true), array('required' => 'Debe ingresar un valor')),
            'telefono_local'  => new sfValidatorString(array('required' => false)),
            'telefono_celular'  => new sfValidatorString(array('required' => false)),
            'email'  => new sfValidatorEmail(array('required' => true),array('required'   => 'Este campo es requerido','invalid' => 'El formato del correo ingresado es inválido')),
            'observaciones'  => new sfValidatorString(array('required' => false)),
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
     ));
    
    
    $this->widgetSchema['cedula'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el siguiente formato Ej: V12345678'));
    $this->widgetSchema['rif'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el siguiente formato Ej: J12345678'));
    $this->widgetSchema['telefono_local'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el siguiente formato Ej: 0212-5555555'));
    $this->widgetSchema['telefono_celular'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el siguiente formato Ej: 0414-5555555'));
    $this->widgetSchema['sexo'] = new sfWidgetFormSelect(array('choices' => self::$sexo));
    
    $this->widgetSchema->setLabel('nombre', 'Nombre <font color="red">*</font>');
    $this->widgetSchema->setLabel('apellido', 'Apellido <font color="red">*</font>');
    $this->widgetSchema->setLabel('cedula', 'Cédula <font color="red">*</font>');
    $this->widgetSchema->setLabel('rif', 'RIF <font color="red">*</font>');
    $this->widgetSchema->setLabel('nacionalidad', 'País de origen<font color="red">*</font>');  
    $this->widgetSchema->setLabel('telefono_local', 'Teléfono local');  
    $this->widgetSchema->setLabel('telefono_celular', 'Teléfono celular');
    $this->widgetSchema->setLabel('email', 'Correo electrónico<font color="red">*</font>');
    $this->widgetSchema->setLabel('observaciones', 'Observaciones');
  }
}
