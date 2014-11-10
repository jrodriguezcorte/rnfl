<?php

/**
 * Usuario form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class UsuarioForm extends BaseUsuarioForm
{
  public function configure()
  {
    $this->widgetSchema['isbn'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['login'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['sf_guard_user'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['sexo'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['sf_guard_user_group'] = new sfWidgetFormInputHidden();
        
    $this->widgetSchema['contrasena'] = new sfWidgetFormInputPassword();
    
    $this->widgetSchema->setLabel('nombre', 'Nombre <font color="red">*</font>');
    $this->widgetSchema->setLabel('apellido', 'Apellido <font color="red">*</font>');
    $this->widgetSchema->setLabel('cedula', 'Cédula o RIF <font color="red">*</font>');
    $this->widgetSchema->setLabel('contrasena', 'Contraseña <font color="red">*</font>');
    $this->widgetSchema->setLabel('correo', 'Correo Electrónico <font color="red">*</font>');
    $this->widgetSchema->setLabel('telefono', 'Teléfono de contacto <font color="red">*</font>');
    
        $this->setValidators(array(
            'nombre' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'apellido' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'cedula' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'contrasena' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'correo'  => new sfValidatorEmail(array('required' => true),array('required'   => 'Este campo es requerido','invalid' => 'El formato del correo ingresado es inválido')),
            'telefono' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'isbn'  => new sfValidatorString(array('required' => false)),
            'login'  => new sfValidatorString(array('required' => false)),
            'sexo'  => new sfValidatorString(array('required' => false)),
            'sf_guard_user'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'sf_guard_user_group'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
        ));     
        
        $this->widgetSchema['cedula'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el siguiente formato Ej: V-12345678'));
  }
}
