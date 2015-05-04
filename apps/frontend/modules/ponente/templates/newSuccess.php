<?php 
    if ($sf_params->get('id_feria') == '') { 
     include_partial('usuario/menuinicial'); 
     $feria = '';
    } else {
     include_partial('usuario/menuferia');
     $feria = '?id_feria='.$sf_params->get('id_feria');
    }
?>

<div class="jumbotron">
<p align="right"><?php echo link_to(image_tag('back.png'), 'ponente/index', array('title' => 'Volver al Listado')) ?></p>        
<h2>Nuevo Ponente</h2>
<br>
<?php include_partial('form', array('form' => $form)) ?>
</div>
<br>