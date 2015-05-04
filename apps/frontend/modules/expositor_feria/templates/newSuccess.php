<?php include_partial('usuario/menuferia') ?>
<?php 
    $id_expositor = $sf_params->get('id_expositor');
    $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
    if (count($Expositor) > 0) {
        $expositor = $Expositor->getNombre().' '.$Expositor->getApellido();
    }
?>       
<div class="jumbotron">
    <p align="right">
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"expositor/indexexp?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;        
    </p>    
<h2>Agregar Solicitud del expositor <?php echo $expositor?></h2>
<br>
<?php include_partial('form', array('form' => $form)) ?>
</div>
<br>