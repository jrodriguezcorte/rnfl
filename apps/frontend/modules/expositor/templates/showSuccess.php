<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<h2>Detalle del Expositor</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Expositor->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $Expositor->getApellido() ?></td>
    </tr>
    <tr>
      <th>Cédula:</th>
      <td><?php echo $Expositor->getCedula() ?></td>
    </tr>
    <tr>
      <th>País:</th>
      <td><?php echo $Expositor->getPais() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'expositor/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'expositor/edit?id='.$Expositor->getId(),array('title' => 'Editar'))?>
</div>
