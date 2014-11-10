<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
<h2>Detalle de la Actividad</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Actividad->getNombre() ?></td>
    </tr>
    <tr>
      <th>Ejecutada:</th>
      <td><?php $Actividad->getEjecutada() == true ? $ejecutada = "Sí" : $ejecutada = "No"; 
                 echo $ejecutada; ?>
      </td>
    </tr>
    <tr>
      <th>N° de participantes masculinos:</th>
      <td><?php echo $Actividad->getCantidadParticipantesM() ?></td>
    </tr>
    <tr>
      <th>N° de participantes femeninos:</th>
      <td><?php echo $Actividad->getCantidadParticipantesF() ?></td>
    </tr>
    <tr>
      <th>¿Alcanzó el tiempo?:</th>
      <td><?php  $Actividad->getAlcanzoTiempo() == true ? $alcanzo = "Sí" : $alcanzo = "No"; 
                 echo $alcanzo;
           ?>
      </td>
    </tr>
    <tr>
      <th>Causas de incumplimiento:</th>
      <td><?php echo $Actividad->getCausasIncumplimiento() ?></td>
    </tr>
    <tr>
      <th>Observaciones:</th>
      <td><?php echo $Actividad->getObservaciones() ?></td>
    </tr>
    <tr>
      <th>Tipo de actividad:</th>
      <td><?php $TipoActividad = TipoActividadQuery::create()->filterById($Actividad->getIdTipoActividad())->findOne();
                echo $TipoActividad->getNombre() ?>
      </td>    
    </tr>
    <?php if ($Actividad->getIdTipoActividad() == 5) { ?> 
    <tr>
      <th>Observación:</th>
      <td><?php echo $Actividad->getObservacionTipoActividad() ?></td>
    </tr>
    <?php } ?>
    <tr>
      <th>Fecha:</th>
      <td><?php echo implode("-", array_reverse(explode("-", $Actividad->getFecha()))); ?></td>
    </tr>
    <tr>
      <th>Hora:</th>
      <td><?php echo $Actividad->getHora() ?></td>
    </tr>
    <tr>
      <th>Facilitador:</th>
      <td><?php echo $Actividad->getFacilitador() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"actividad/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),"actividad/edit?id_feria=".$id_feria."&id=".$Actividad->getId(),array('title' => 'Editar'))?>
<br>
<br>

