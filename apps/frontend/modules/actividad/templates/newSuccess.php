<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
    <?php $id_feria = $sf_params->get('id_feria'); ?>
    <p align="right">
        <?php echo link_to(image_tag('back.png'), "actividad/index?id_feria=$id_feria", array('title' => 'Volver al Listado')) ?>
    </p>     
<h2>Agregar Actividad</h2>
<br>
<?php include_partial('form', array('form' => $form)) ?>
</div>
<br>