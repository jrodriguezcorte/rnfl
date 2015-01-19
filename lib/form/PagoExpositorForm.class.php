<?php

/**
 * PagoExpositor form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
class PagoExpositorForm extends BasePagoExpositorForm
{
  public function configure()
  {
        $this->widgetSchema['es_pago_banco_nacional'] = new sfWidgetFormChoice(array(
            'choices' => array('Nacional', 'Internacional'),
        ));
        
        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_expositor'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_usuario'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['id_expositor_feria'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['status_actual'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['pago_aprobado'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['fecha'] = new sfWidgetFormInputHidden();
        
         $years = range(1900, date('Y') + 100);
        
        $this->widgetSchema['fecha_pago'] = new sfWidgetFormJQueryDate(array(
            'image' => '/images/calendar.png', 'culture' => 'es',
            'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'es')),
            'config' => '{ changeMonth: true, changeYear: true, firstDay: 1 }',
            'date_widget' => new sfWidgetFormi18nDate(array(
                'years' => array_combine($years, $years),
                'culture' => 'es'
                    ))
        ));    
        
        $this->getWidgetSchema()->moveField('es_pago_banco_nacional', sfWidgetFormSchema::BEFORE, 'id_banco');
        $this->getWidgetSchema()->moveField('monto', sfWidgetFormSchema::AFTER, 'numero_deposito');
        
        $this->widgetSchema->setLabel('monto', 'Monto depositado <font color="red">*</font>&nbsp;<b class="monto"></b>'); 
        $this->widgetSchema->setLabel('fecha_pago', 'Fecha de depósito<font color="red">*</font>'); 
        $this->widgetSchema->setLabel('id_banco', 'Banco <font color="red">*</font>'); 
        $this->widgetSchema->setLabel('numero_deposito', 'N° de depósito <font color="red">*</font>'); 
        $this->widgetSchema->setLabel('es_pago_banco_nacional', 'Depósito en banco <font color="red">*</font>'); 
       
        
        $this->setValidators(array(
            'id' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'monto' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id_feria' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_expositor' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_usuario' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id_expositor_feria' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'status_actual' => new sfValidatorString(array('required' => false)),
            'pago_aprobado' => new sfValidatorString(array('required' => false)),
            'fecha' => new sfValidatorDate(array('required' => false)),
            'id_banco' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'numero_deposito' => new sfValidatorString(array('required' => false)),
            'fecha_pago' => new sfValidatorDate(array('required' => false)),            
            'es_pago_banco_nacional' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
        ));       
  }
}
