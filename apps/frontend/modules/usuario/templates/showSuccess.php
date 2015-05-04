<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<p align='right'>
<?php echo link_to(image_tag('back.png'),'usuario/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'usuario/edit?id='.$Usuario->getId(),array('title' => 'Editar'))?>
</p>    
<h2>Detalle del Usuario</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
<tr>
      <th>Nombre:</th>
      <td><?php echo $Usuario->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $Usuario->getApellido() ?></td>
    </tr>
    <tr>
      <th>Login:</th>
      <td><?php echo $Usuario->getLogin() ?></td>
    </tr>
    <tr>
      <th>Correo:</th>
      <td><?php echo $Usuario->getCorreo() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $Usuario->getTelefono() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'usuario/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'usuario/edit?id='.$Usuario->getId(),array('title' => 'Editar'))?>