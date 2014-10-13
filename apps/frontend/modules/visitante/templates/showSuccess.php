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
<?php echo link_to(image_tag('back.png'),'visitante/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'visitante/edit?id='.$Visitante->getId(),array('title' => 'Editar'))?>



