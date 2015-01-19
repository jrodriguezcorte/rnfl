<?php

/**
 * Banco form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
class BancoForm extends BaseBancoForm
{
  public function configure()
  {
      
        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['es_nacional'] = new sfWidgetFormInputHidden();
      
        $this->widgetSchema->setLabel('id_moneda', 'Moneda <font color="red">*</font>'); 
        $this->widgetSchema->setLabel('id_pais', 'País <font color="red">*</font>'); 
      
        $this->setValidators(array(
            'id' => new sfValidatorInteger(array('min' => 1, 'required' => false)),          
            'nombre' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'es_nacional' => new sfValidatorString(array('required' => false)),
            'id_feria'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_pais'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),   
            'id_moneda'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),   
        ));   
        
  }
}
