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
        $this->widgetSchema['forma_pago'] = new sfWidgetFormChoice(array(
            'choices' => array('Nacional', 'Internacional'),
        ));
        
        $this->widgetSchema['deposito_nacional'] = new sfWidgetFormChoice(array(
            'choices' => array('Efectivo', 'Cheque de Gerencia'),
        ));        
        
        $pago = 'Deposito en Efectivo y/o Cheque de Gerencia en cuenta Corriente N°, en el Banco De Venezuela a Nombre de: ';
        
        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_expositor'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_usuario'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['id_expositor_feria'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['status_actual'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['pago_aprobado'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema['fecha'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema->setLabel('forma_pago', 'Forma de pago <font color="red">*</font>');
        $this->widgetSchema->setLabel('deposito_nacional', 'Depósito Nacional <font color="red">*</font>');
        $this->widgetSchema->setLabel('planilla_deposito_nacional', 'Planilla de depósito N° <font color="red">*</font>'); 
        $this->widgetSchema->setLabel('transferencia_cuenta', 'Transferencia desde la Cuenta <font color="red">*</font>'); 
        $this->widgetSchema->setLabel('banco_emisor', 'Banco Emisor <font color="red">*</font>'); 
        $this->widgetSchema->setLabel('numero_transaccion', 'N° de transacción <font color="red">*</font>'); 
        $this->widgetSchema->setLabel('monto', 'Monto depositado <font color="red">*</font>'); 
  }
}
