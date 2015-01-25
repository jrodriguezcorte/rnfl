<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
<h2>Detalle del Stand</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>
      <th>Metros:</th>
      <td><?php echo $Stand->getMetros() ?></td>
    </tr>
    <tr>
      <th>Costo en Bs:</th>
      <td><?php echo $Stand->getCostoBs() ?></td>
    </tr>
    <tr>
      <th>Costo en USD:</th>
      <td><?php echo $Stand->getCostoDs() ?></td>
    </tr>    
  </tbody>
</table>
</div>
<hr />
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"stand/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),"stand/edit?id_feria=".$id_feria."&id=".$Stand->getId(),array('title' => 'Editar'))?>
<br>
<br>

