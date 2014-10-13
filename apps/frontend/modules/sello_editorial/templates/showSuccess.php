<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<h2>Detalle del Sello Editorial</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $SelloEditorial->getNombre() ?></td>
    </tr>
    <tr>
      <th>País:</th>
      <td><?php echo $SelloEditorial->getPais() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'sello_editorial/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'sello_editorial/edit?id='.$SelloEditorial->getId(),array('title' => 'Editar'))?>
</div>
