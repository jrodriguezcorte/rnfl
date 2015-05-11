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

        $years = range(1900, date('Y') + 100);

        $this->widgetSchema['fecha_sugerida'] = new sfWidgetFormJQueryDate(array(
            'image' => '/images/calendar.png', 'culture' => 'es',
            'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'es')),
            'config' => '{ changeMonth: true, changeYear: true, firstDay: 1 }',
            'date_widget' => new sfWidgetFormi18nDate(array(
                'years' => array_combine($years, $years),
                'culture' => 'es'
                    ))
        ));

        $this->widgetSchema['hora'] = new sfWidgetFormTime(array
            ('label' => 'Hora Sugerida', 'with_seconds' => false));

        $this->widgetSchema['descripcion_actividad'] = new sfWidgetFormTextareaTinyMCE(array(
            'width' => 600,
            'height' => 200,
            'config' => 'theme_advanced_disable: "anchor,image,cleanup,help,code",
             theme_advanced_buttons1 : "bold,italic,separator,bullist,separator,link, sub,sup,separator,charmap,separator,numlist,separator,outdent,indent,separator,undo,redo,separator,unlink,separator,hr,removeformat",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_buttons4: "",theme_advanced_path : false,',
        ));
        ;

        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_usuario'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['actividad_cerrada'] = new sfWidgetFormInputHidden();

        $this->getWidgetSchema()->moveField('fecha_sugerida', sfWidgetFormSchema::AFTER, 'email');
        $this->getWidgetSchema()->moveField('hora', sfWidgetFormSchema::AFTER, 'fecha_sugerida');

        $this->widgetSchema['telefono_local'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el formato: 0000-0000000'));
        $this->widgetSchema['telefono_celular'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el formato: 0000-0000000'));

        $this->widgetSchema['activo'] = new sfWidgetFormInputHidden();

        $this->widgetSchema->setLabel('fecha_sugerida', 'Fecha Sugerida <font color="red">*</font>');
        $this->widgetSchema->setLabel('hora', 'Hora Sugerida <font color="red">*</font>');
        $this->widgetSchema->setLabel('stand_numero', 'Stand N° ');
        $this->widgetSchema->setLabel('nombre_empresa', 'Nombre de la Empresa <font color="red">*</font>');
        $this->widgetSchema->setLabel('direccion', 'Dirección <font color="red">*</font>');
        $this->widgetSchema->setLabel('nombre_solicitante', 'Nombre del Solicitante <font color="red">*</font>');
        $this->widgetSchema->setLabel('nombre_representante', 'Nombre del Representante <font color="red">*</font>');
        $this->widgetSchema->setLabel('telefono_local', 'Teléfono Local <font color="red">*</font>');
        $this->widgetSchema->setLabel('telefono_celular', 'Teléfono Celular <font color="red">*</font>');
        $this->widgetSchema->setLabel('fax', 'Fax');
        $this->widgetSchema->setLabel('email', 'Correo Electrónico <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_tipo_actividad', 'Tipo de Actividad <font color="red">*</font>');
        $this->widgetSchema->setLabel('titulo', 'Título de la Actividad <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_tipo_actividad', 'Tipo de Actividad <font color="red">*</font>');
        $this->widgetSchema->setLabel('autor', 'Autor <font color="red">*</font>');
        $this->widgetSchema->setLabel('editorial', 'Editorial ');
        $this->widgetSchema->setLabel('descripcion_actividad', 'Descripción de la Actividad');
        $this->widgetSchema->setLabel('presente_autor', '¿Estará presente el Autor?');
        $this->widgetSchema->setLabel('publico_dirigido', 'Público Dirigido');
        $this->widgetSchema->setLabel('numero_ponentes', 'N° de Ponentes');

        $this->setValidators(array(
            'id' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'fecha_sugerida' => new sfValidatorDate(array('required' => false)),
            'hora' => new sfValidatorDate(array('required' => false)),
            'id_feria' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_usuario' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'stand_numero' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'nombre_empresa' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'direccion' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'nombre_solicitante' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'nombre_representante' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'telefono_local' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'telefono_celular' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'fax' => new sfValidatorString(array('required' => false)),
            'email' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'id_tipo_actividad' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'titulo' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'autor' => new sfValidatorString(array('required' => false)),
            'editorial' => new sfValidatorString(array('required' => false)),
            'descripcion_actividad' => new sfValidatorString(array('required' => false)),
            'presente_autor' => new sfValidatorString(array('required' => false)),
            'publico_dirigido' => new sfValidatorString(array('required' => false)),
            'numero_ponentes' => new sfValidatorString(array('required' => false)),
            'actividad_cerrada' => new sfValidatorString(array('required' => false)),
            'activo' => new sfValidatorString(array('required' => false)),
        ));
    }

}
