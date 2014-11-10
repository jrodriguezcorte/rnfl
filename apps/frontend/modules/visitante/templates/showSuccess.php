<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
<h2>Detalle de los visitantes</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Fecha:</th>
      <td><?php echo implode("-", array_reverse(explode("-", $Visitante->getFecha()))); ?></td>
    </tr>
    <tr>
      <th>Cantidad de visitantes:</th>
      <td><?php echo $Visitante->getNumero() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"visitante/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),"visitante/edit?id_feria=".$id_feria."&id=".$Visitante->getId(),array('title' => 'Editar'))?>
<br>
<br>


