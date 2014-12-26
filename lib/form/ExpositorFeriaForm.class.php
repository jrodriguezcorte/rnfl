<?php

/**
 * ExpositorFeria form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 */
class ExpositorFeriaForm extends BaseExpositorFeriaForm {

    public function configure() {
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


        $this->widgetSchema['id_feria'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_expositor'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['id_usuario'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['procedencia'] = new sfWidgetFormChoice(array(
            'choices' => array('Nacional', 'Internacional'),
        ));

        $this->widgetSchema['telefono_local'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el siguiente formato Ej: 0000-0000000'));

        $this->widgetSchema['telefono_celular'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Use el siguiente formato Ej: 0000-0000000'));

        $choices = array(
            1 => "Administración y gerencia",
            2 => "Arquitectura y diseño",
            3 => "Arte",
            4 => "Artesanía y Manualidades",
            5 => "Astrología, metafísica y espiritualidad",
            6 => "Auto-ayuda y superación",
            7 => "Best-Sellers",
            8 => "Ciencia y Tecnología",
            9 => "Ciencias Sociales y Comunicación",
            10 => "Cine y fotografía",
            11 => "Cocina, alimentación, salud",
            12 => "Computación e informática",
            13 => "Deporte y recreación",
            14 => "Derecho",
            15 => "Diccionarios, enciclopedias, atlas",
            16 => "Economía",
            17 => "Educación y pedagogía",
            18 => "Filosofía",
            19 => "Historia y geografía",
            20 => "Humanidades",
            21 => "Humor y comics",
            22 => "Idiomas",
            23 => "Infantiles",
            24 => "Literatura",
            25 => "Medicina",
            26 => "Música y folklore",
            27 => "Naturaleza, ecología, turismo",
            28 => "Política",
            29 => "Psicología",
            30 => "Religión",
            31 => "Técnicos y profesionales",
            32 => "Textos educativos",
            33 => "Textos Universitarios",
        );

        $this->widgetSchema['opciones'] = new sfWidgetFormChoice(array("choices" => $choices, "multiple" => true, "expanded" => true, "label" => "Línea Editorial"));

        $this->getWidgetSchema()->moveField('opciones', sfWidgetFormSchema::AFTER, 'sello_editorial');

        $this->widgetSchema->setLabel('nombe_empresa', 'Nombre de la empresa <font color="red">*</font>');
        $this->widgetSchema->setLabel('procedencia', 'Procedencia <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_pais', 'País <font color="red">*</font>');
        $this->widgetSchema->setLabel('ciudad', 'Ciudad <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_tipo_distribuidor', 'Tipo de distribuidor <font color="red">*</font>');
        $this->widgetSchema->setLabel('sello_editorial', 'Sello Editorial <font color="red">*</font>');
        $this->widgetSchema->setLabel('direccion', 'Dirección <font color="red">*</font>');
        $this->widgetSchema->setLabel('domicilio_fiscal', 'Domicilio fiscal <font color="red">*</font>');
        $this->widgetSchema->setLabel('telefono_local', 'Teléfono Local <font color="red">*</font>');
        $this->widgetSchema->setLabel('telefono_celular', 'Teléfono Celular <font color="red">*</font>');
        $this->widgetSchema->setLabel('fax', 'Fax');
        $this->widgetSchema->setLabel('email', 'Correo electrónico <font color="red">*</font>');
        $this->widgetSchema->setLabel('sitio_web', 'Portal web');
        $this->widgetSchema->setLabel('nombre_director', 'Nombre del Director <font color="red">*</font>');
        $this->widgetSchema->setLabel('representante_legal', 'Representante legal de la empresa <font color="red">*</font>');
        $this->widgetSchema->setLabel('nombre_ejecutivo_feria', 'Nombre del ejecutivo <font color="red">*</font>');
        $this->widgetSchema->setLabel('contacto', 'Información de contacto <font color="red">*</font>');
        $this->widgetSchema->setLabel('responsable_stand', 'Responsable del Stand <font color="red">*</font>');
        $this->widgetSchema->setLabel('atencion_stand', 'Atención del Stand durante la feria <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_stand', 'Tipo de stand (metros cuadrados) <font color="red">*</font>');
        $this->widgetSchema->setLabel('numero_titulos', 'N° de títulos');
        $this->widgetSchema->setLabel('numero_novedades', 'N° de novedades');
        $this->widgetSchema->setLabel('observaciones', 'Observaciones');


        $this->setValidators(array(
            'id' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_expositor' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'nombe_empresa' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'procedencia' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'id_pais' => new sfValidatorInteger(array(), array('required' => 'Este campo es requerido',)),
            'ciudad' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'id_tipo_distribuidor' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'sello_editorial' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'direccion' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'domicilio_fiscal' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'telefono_local' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'telefono_celular' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'fax' => new sfValidatorString(array('required' => false)),
            'email' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'sitio_web' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'nombre_director' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'representante_legal' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'nombre_ejecutivo_feria' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'contacto' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'responsable_stand' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'atencion_stand' => new sfValidatorString(array(), array('required' => 'Este campo es requerido',)),
            'id_stand' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'numero_titulos' => new sfValidatorString(array('required' => false)),
            'numero_novedades' => new sfValidatorString(array('required' => false)),
            'observaciones' => new sfValidatorString(array('required' => false)),
            'id_usuario' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'id_feria' => new sfValidatorInteger(array('min' => 1, 'required' => false)),
            'opciones' => new sfValidatorString(array('required' => false)),
        ));
    }

}
