<?php

/**
 * Region form.
 *
 * @package    rnfl
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RegionForm extends BaseRegionForm
{
  public function configure()
  {
    $this->setValidators(array(
            'nombre' => new sfValidatorString(array(), array('required'   => 'Este campo es requerido',)),
            'id'  => new sfValidatorInteger(array('min' => 1, 'required' => false)),
     ));
    
    $this->widgetSchema->setLabel('nombre', 'Nombre <font color="red">*</font>');
  }
}
