<?php

/**
 * Stand form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
class StandForm extends BaseStandForm
{
  public function configure()
  {
       $this->widgetSchema->setLabel('metros', 'Metros Cuadrados (m<sup>2</sup>) <font color="red">*</font>');
       $this->widgetSchema->setLabel('costo_bs', 'Costo Bs <font color="red">*</font>');
       $this->widgetSchema->setLabel('costo_ds', 'Costo USD');
        
       $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();  
        
       $this->setValidators(array(
            'metros' => new sfValidatorNumber(array('required' => true,'required' => 'Campo Requerido')),
            'costo_bs' => new sfValidatorNumber(array('required' => true)),
            'costo_ds' => new sfValidatorNumber(array('required' => false)),
            'id_feria'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)), 
       ));    
  }
}
