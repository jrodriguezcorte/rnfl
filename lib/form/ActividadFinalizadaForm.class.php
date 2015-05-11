<?php

/**
 * ActividadFinalizada form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
class ActividadFinalizadaForm extends BaseActividadFinalizadaForm {

    public function configure() {

        $years = range(1900, date('Y') + 100);

        $this->widgetSchema['fecha_ejecucion'] = new sfWidgetFormJQueryDate(array(
            'image' => '/images/calendar.png', 'culture' => 'es',
            'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'es')),
            'config' => '{ changeMonth: true, changeYear: true, firstDay: 1 }',
            'date_widget' => new sfWidgetFormi18nDate(array(
                'years' => array_combine($years, $years),
                'culture' => 'es'
                    ))
        ));

        $this->widgetSchema['hora_ejecucion'] = new sfWidgetFormTime(array
            ('label' => 'Hora de Ejecución', 'with_seconds' => false));

        $this->widgetSchema['hora_fin_ejecucion'] = new sfWidgetFormTime(array
            ('label' => 'Hora final de Ejecución', 'with_seconds' => false));


        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_actividad'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_usuario'] = new sfWidgetFormInputHidden();

        $choices = array(
            1 => "Ausencia de Moderador",
            2 => "Ausencia de Ponente",
            3 => "Ausencia de Público",
            4 => "Problemas Técnicos",
            5 => "Otros",
        );

        $this->widgetSchema['opciones'] = new sfWidgetFormChoice(array("choices" => $choices, "multiple" => true, "expanded" => true, "label" => "Causas del Incumplimiento"));
        $this->widgetSchema['activo'] = new sfWidgetFormInputHidden();

        $this->getWidgetSchema()->moveField('opciones', sfWidgetFormSchema::AFTER, 'evento_publico');
        $this->getWidgetSchema()->moveField('incluir_info_geografica', sfWidgetFormSchema::AFTER, 'nombre_institucion');



        $this->widgetSchema->setLabel('nombre_responsable', 'Nombre del Responsable <font color="red">*</font>');
        $this->widgetSchema->setLabel('fecha_ejecucion', 'Fecha de ejecución <font color="red">*</font>');
        $this->widgetSchema->setLabel('hora_ejecucion', 'Hora de ejecución <font color="red">*</font>');
        $this->widgetSchema->setLabel('hora_fin_ejecucion', 'Hora final de Ejecución <font color="red">*</font>');
        $this->widgetSchema->setLabel('participantes_m', 'Participantes Masculinos');
        $this->widgetSchema->setLabel('participantes_f', 'Participantes Femeninos');
        $this->widgetSchema->setLabel('total', 'Total de Participantes');
        $this->widgetSchema->setLabel('evento_publico', 'Evento Público');
        $this->widgetSchema->setLabel('otro_incumplimiento', 'Otro Incumplimiento');
        $this->widgetSchema->setLabel('nombre_institucion', 'Nombre de la Institución');
        $this->widgetSchema->setLabel('id_pais', 'País');
        $this->widgetSchema->setLabel('id_estado', 'Estado');
        $this->widgetSchema->setLabel('id_municipio', 'Municipio');
        $this->widgetSchema->setLabel('id_parroquia', 'Parroquia');
        $this->widgetSchema->setLabel('id_region', 'Región');
        $this->widgetSchema->setLabel('incluir_info_geografica', 'Incluir Información Geográfica');

        $this->setValidators(array(
            'id' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_actividad' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_feria' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'nombre_responsable' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'fecha_ejecucion' => new sfValidatorDate(array('required' => false)),
            'hora_ejecucion' => new sfValidatorDate(array('required' => false)),
            'hora_fin_ejecucion' => new sfValidatorDate(array('required' => false)),
            'participantes_m' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'participantes_f' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'total' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'evento_publico' => new sfValidatorString(array('required' => false)),
            'otro_incumplimiento' => new sfValidatorString(array('required' => false)),
            'nombre_institucion' => new sfValidatorString(array('required' => false)),
            'id_pais' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id_estado' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id_municipio' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id_parroquia' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id_region' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'incluir_info_geografica' => new sfValidatorString(array('required' => false)),
            'id_usuario' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'opciones' => new sfValidatorString(array('required' => false)),
            'activo' => new sfValidatorString(array('required' => false)),
        ));
    }

}
