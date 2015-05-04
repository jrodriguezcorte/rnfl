<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<p align="right"><?php echo link_to(image_tag('back.png'), 'feria/index', array('title' => 'Volver al Listado')) ?></p>    
<h2>Editar Feria</h2>
<br>
<?php include_partial('form', array('form' => $form)) ?>
</div>
<br>