<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<h2>Detalle del Municipio</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Municipio->getNombre() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php $Estado = EstadoQuery::create()->filterById($Municipio->getIdEstado())->findOne();
                echo $Estado->getNombre() ?></td>
    </tr>
    <tr>
      <th>País:</th>
      <td><?php $Pais = PaisQuery::create()->filterById($Estado->getIdPais())->findOne();
                echo $Pais->getNombre() ?>
      </td>
    </tr>     
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'municipio/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'municipio/edit?id='.$Municipio->getId(),array('title' => 'Editar'))?>
</div>