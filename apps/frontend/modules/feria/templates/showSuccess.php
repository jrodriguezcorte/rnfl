<?php include_partial('usuario/menuinicial') ?>

<div class="jumbotron">
<h2>Detalle de la Feria</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Feria->getNombre() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $Feria->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Fecha de Inicio:</th>
      <td><?php echo implode("-", array_reverse(explode("-", $Feria->getFechaInicio()))); ?></td>
    </tr>
    <tr>
      <th>Fecha de Cierre:</th>
      <td><?php echo implode("-", array_reverse(explode("-", $Feria->getFechaFin()))); ?></td>
    </tr>
    <tr>
      <th>País:</th>
      <td><?php $Pais = PaisQuery::create()->filterById($Feria->getIdPais())->findOne();
                echo $Pais->getNombre() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php $Estado = EstadoQuery::create()->filterById($Feria->getIdEstado())->findOne();
                echo $Estado->getNombre() ?></td>
    </tr>
    <tr>
      <th>Municipio:</th>
      <td><?php $Municipio = MunicipioQuery::create()->filterById($Feria->getIdMunicipio())->findOne();
                echo $Municipio->getNombre() ?></td>
    </tr>
    <tr>
      <th>Parroquia:</th>
      <td><?php $Parroquia = ParroquiaQuery::create()->filterById($Feria->getIdParroquia())->findOne();
                echo $Parroquia->getNombre() ?></td>
    </tr>
    <tr>
      <th>Región:</th>
      <td><?php $Region = RegionQuery::create()->filterById($Feria->getIdRegion())->findOne();
                echo $Region->getNombre() ?></td>
    </tr>
    <tr>
      <th>Costo:</th>
      <td><?php echo $Feria->getCosto() ?></td>
    </tr>
    <tr>
      <th>Libro más vendido:</th>
      <td><?php echo $Feria->getLibroMasVendido() ?></td>
    </tr>
    <tr>
      <th>Autor del libro más vendido:</th>
      <td><?php echo $Feria->getAutorLibroMasVendido() ?></td>
    </tr>
    <tr>
      <th>Extensión del recinto en m<sup>2</sup>:</th>
      <td><?php echo $Feria->getExtensionSuperficie() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'feria/index',array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'feria/edit?id='.$Feria->getId(),array('title' => 'Editar'))?>
</div>


