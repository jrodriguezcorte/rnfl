<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<h2>Detalle de la Región</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Region->getNombre() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'region/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'region/edit?id='.$Region->getId(),array('title' => 'Editar'))?>
</div>