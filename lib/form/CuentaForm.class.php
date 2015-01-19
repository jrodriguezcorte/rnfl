<?php

/**
 * Cuenta form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
class CuentaForm extends BaseCuentaForm
{
  public function configure()
  {
     
        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();
      
        
        $this->setValidators(array(
            'id' => new sfValidatorInteger(array('min' => 1, 'required' => false)),          
            'id_banco' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'numero' => new sfValidatorString(array(), array('required' => 'Debe ingresar un valor',)),
            'swift' => new sfValidatorString(array('required' => false)),
            'aba' => new sfValidatorString(array('required' => false)),
            'beneficiario' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'id_feria'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),   
        )); 
        
        $this->widgetSchema->setLabel('numero', 'Número de Cuenta <font color="red">*</font>'); 
        
        $this->widgetSchema->setLabel('id_banco', 'Banco <font color="red">*</font>'); 
        
        $this->widgetSchema->setLabel('beneficiario', 'Beneficiario <font color="red">*</font>'); 
        
        $this->widgetSchema['numero'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Ingrese el número sin espacios ni guiones'));
      
        $this->getWidgetSchema()->moveField('numero', sfWidgetFormSchema::AFTER, 'id_banco'); 
        
        $this->getWidgetSchema()->moveField('beneficiario', sfWidgetFormSchema::AFTER, 'numero'); 
      
  }
}
