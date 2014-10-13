<?php

/**
 * Visitante form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class VisitanteForm extends BaseVisitanteForm
{
  public function configure()
  {
      
        $years = range(1900, date('Y') + 100);

        $this->widgetSchema['fecha'] = new sfWidgetFormJQueryDate(array(
            'image' => '/images/calendar.png', 'culture' => 'es',
            'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'es')),
            'config' => '{ changeMonth: true, changeYear: true, firstDay: 1 }',
            'date_widget' => new sfWidgetFormi18nDate(array(
                'years' => array_combine($years, $years),
                'culture' => 'es'
                    ))
        ));
        
        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();
        
        $this->widgetSchema->setLabel('fecha', 'Fecha <font color="red">*</font>');
        $this->widgetSchema->setLabel('numero', 'Cantidad de Visitantes <font color="red">*</font>');
        
        $this->setValidators(array(
            'numero' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'fecha' => new sfValidatorDate(array('required' => false)),
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_feria'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),   
        ));        
  }
}
