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
       $this->widgetSchema->setLabel('metros', 'Metross <font color="red">*</font>');
       $this->widgetSchema->setLabel('tarifa', 'Tarifa <font color="red">*</font>');
        
       $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();  
        
       $this->setValidators(array(
            'metros' => new sfValidatorNumber(array('required' => true,'required' => 'Campo Requerido')),
            'tarifa' => new sfValidatorNumber(array('required' => true)),
            'id_feria'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)), 
       ));    
  }
}
