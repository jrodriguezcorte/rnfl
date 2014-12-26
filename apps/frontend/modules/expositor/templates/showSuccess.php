<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<h2>Información básica del expositor</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>
      <th>Nombre y Apellido:</th>
      <td><?php echo $Expositor->getNombre().'  '.$Expositor->getApellido() ?></td>
    </tr>
    <tr>
      <th>Cédula:</th>
      <td><?php $Expositor->getCedula() ?>
      </td>
    </tr>
    <tr>
      <th>Rif:</th>
      <td><?php $Expositor->getRif() ?>
      </td>
    </tr>
    <tr>
      <th>País:</th>
      <td><?php  $Pais = PaisQuery::create()->filterById($Expositor->getIdPais())->findOne();
                  echo $Pais->getNombre();
           ?>
      </td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),"expositor/index",array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),"expositor/edit?id=".$Expositor->getId(),array('title' => 'Editar'))?>
<br>
<br>
