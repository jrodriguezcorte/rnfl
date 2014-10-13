<?php

/**
 * Feria form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class FeriaForm extends BaseFeriaForm
{
  public function configure()
  {
      
        $years = range(1900, date('Y') + 100);

        $this->widgetSchema['fecha_inicio'] = new sfWidgetFormJQueryDate(array(
            'image' => '/images/calendar.png', 'culture' => 'es',
            'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'es')),
            'config' => '{ changeMonth: true, changeYear: true, firstDay: 1 }',
            'date_widget' => new sfWidgetFormi18nDate(array(
                'years' => array_combine($years, $years),
                'culture' => 'es'
                    ))
        ));
        
        $this->widgetSchema['fecha_fin'] = new sfWidgetFormJQueryDate(array(
            'image' => '/images/calendar.png', 'culture' => 'es',
            'date_widget' => new sfWidgetFormi18nDate(array('culture' => 'es')),
            'config' => '{ changeMonth: true, changeYear: true, firstDay: 1 }',
            'date_widget' => new sfWidgetFormi18nDate(array(
                'years' => array_combine($years, $years),
                'culture' => 'es'
                    ))
        ));  
        
        $this->widgetSchema['descripcion'] = new sfWidgetFormTextareaTinyMCE(array(
            'width' => 600,
            'height' => 200,
            'config' => 'theme_advanced_disable: "anchor,image,cleanup,help,code",
             theme_advanced_buttons1 : "bold,italic,separator,bullist,separator,link, sub,sup,separator,charmap,separator,numlist,separator,outdent,indent,separator,undo,redo,separator,unlink,separator,hr,removeformat",
    theme_advanced_buttons2: "",
    theme_advanced_buttons3: "",
    theme_advanced_buttons4: "",theme_advanced_path : false,',
        ));
        ;        
        
        $this->widgetSchema->setLabel('nombre', 'Nombre <font color="red">*</font>');
        $this->widgetSchema->setLabel('descripcion', 'Descripción <font color="red">*</font>');
        $this->widgetSchema->setLabel('fecha_inicio', 'Fecha de Inicio <font color="red">*</font>');
        $this->widgetSchema->setLabel('fecha_fin', 'Fecha de Cierre <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_pais', 'País <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_estado', 'Estado <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_municipio', 'Municipio <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_parroquia', 'Parroquia <font color="red">*</font>');
        $this->widgetSchema->setLabel('id_region', 'Región <font color="red">*</font>');
        $this->widgetSchema->setLabel('costo', 'Costo de la feria');
        $this->widgetSchema->setLabel('libro_mas_vendido', 'Libro más vendido');
        $this->widgetSchema->setLabel('autor_libro_mas_vendido', 'Autor del libro más vendido');
        $this->widgetSchema->setLabel('extension_superficie', 'Extensión del recinto en m<sup>2</sup> ');
        
        $this->setValidators(array(
            'nombre' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'descripcion' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'fecha_inicio' => new sfValidatorDate(array('required' => false),array('invalid' => 'Debe ingresar un valor')),
            'fecha_fin' => new sfValidatorDate(array('required' => false),array('invalid' => 'Debe ingresar un valor')),
            'id_pais' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id_estado' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'id_municipio' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),            
            'id_parroquia' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),            
            'id_region' => new sfValidatorInteger(array('min' => 1, 'required' => true), array('required' => 'Debe ingresar un valor')),
            'costo' => new sfValidatorInteger(array('required' => false),array('invalid' => 'Debe ingresar un número entero')),
            'libro_mas_vendido' => new sfValidatorString(array('required' => false)),            
            'autor_libro_mas_vendido' => new sfValidatorString(array('required' => false)),
            'extension_superficie'  => new sfValidatorInteger(array('min' => 0, 'required' => false), array('invalid' => 'Debe ingresar un número entero')),   
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
        ));         
  }
}
