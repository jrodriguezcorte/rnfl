<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<h2>Detalle del País</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Pais->getNombre() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'pais/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'pais/edit?id='.$Pais->getId(),array('title' => 'Editar'))?>
</div>
