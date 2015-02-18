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
<h2>Editar Ponente</h2>
<br>
<?php include_partial('form', array('form' => $form)) ?>
</div>
<br>