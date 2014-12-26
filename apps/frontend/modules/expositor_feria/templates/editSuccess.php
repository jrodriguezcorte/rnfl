<?php include_partial('usuario/menuferia') ?>
<?php 
    $id_expositor = $sf_params->get('id_expositor');
    $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
    if (count($Expositor) > 0) {
        $expositor = $Expositor->getNombre().' '.$Expositor->getApellido();
    }
?>       
<div class="jumbotron">
<h2>Editar Solicitud del expositor <?php echo $expositor?></h2>
<br>
<?php include_partial('form', array('form' => $form)) ?>
</div>
<br>
