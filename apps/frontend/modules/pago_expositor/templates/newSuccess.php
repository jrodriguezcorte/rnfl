<?php include_partial('usuario/menuferia') ?>       
<div class="jumbotron">
    <p align="right">
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"expositor_feria/pago?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;        
    </p>     
<h2>Registro Información de Pago</h2>
<br>
<?php include_partial('form', array('form' => $form)) ?>
</div>
<br>