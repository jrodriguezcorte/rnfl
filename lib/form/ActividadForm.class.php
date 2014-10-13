<?php

/**
 * Actividad form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class ActividadForm extends BaseActividadForm {

    public function configure() {
        $this->widgetSchema['causas_incumplimiento'] = new sfWidgetFormTextareaTinyMCE(array(
            'width' => 600,
            'height' => 200,
            'config' => 'theme_advanced_disable: "anchor,image,cleanup,help,code",
             theme_advanced_buttons1 : "bold,italic,separator,bullist,separator,link, sub,sup,separator,charmap,separator,numlist,separator,outdent,indent,separator,undo,redo,separator,unlink,separator,hr,removeformat",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_buttons4: "",theme_advanced_path : false,',
        ));
        ;

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

        $this->widgetSchema->setLabel('nombre', 'Nombre <font color="red">*</font>');
        $this->widgetSchema->setLabel('ejecutada', '¿La actividad fue realizada?');
        $this->widgetSchema->setLabel('cantidad_participantes_m', 'N° de participantes masculinos');
        $this->widgetSchema->setLabel('cantidad_participantes_f', 'N° de participantes femeninos');
        $this->widgetSchema->setLabel('alcanzo_tiempo', '¿Alcanzó el tiempo?');
        $this->widgetSchema->setLabel('causas_incumplimiento', 'Causas de incumplimiento');
        $this->widgetSchema->setLabel('id_tipo_actividad', 'Tipo de actividad <font color="red">*</font>');
        $this->widgetSchema->setLabel('observacion_tipo_actividad', 'Otro');
        $this->widgetSchema->setLabel('fecha', 'Fecha <font color="red">*</font>');
        $this->widgetSchema->setLabel('hora', 'Hora <font color="red">*</font>');

        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();
                
        $this->setValidators(array(
            'nombre' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'cantidad_participantes_m'  => new sfValidatorInteger(array('min' => 0, 'required' => false), array('invalid' => 'Debe ingresar un número entero')),
            'cantidad_participantes_f'  => new sfValidatorInteger(array('min' => 0, 'required' => false), array('invalid' => 'Debe ingresar un número entero')),
            'causas_incumplimiento' => new sfValidatorString(array('required' => false)),
            'observaciones' => new sfValidatorString(array('required' => false)),
            'id_tipo_actividad' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'observacion_tipo_actividad' => new sfValidatorString(array('required' => false)),
            'fecha' => new sfValidatorDate(array('required' => false)),
            'hora' => new sfValidatorDate(array('required' => false)),
            'facilitador' => new sfValidatorString(array('required' => false)),
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_feria'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),   
        ));        
        
    }

}
