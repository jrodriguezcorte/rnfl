<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
<p align="right">
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'), 'actividad_finalizada/index?id_actividad_finalizada='.$id_actividad_finalizada.'&id_feria='.$id_feria, array('title' => 'Volver al Listado')) ?>
&nbsp;        
</p>    
<h2>Incluir Información de la Actividad</h2>
<br>
<?php include_partial('form', array('form' => $form)) ?>
</div>
<br>