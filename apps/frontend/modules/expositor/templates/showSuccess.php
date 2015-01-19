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
      <th>País:</th>
      <td><?php  $Pais = PaisQuery::create()->filterById($Expositor->getIdPais())->findOne();
                  echo $Pais->getNombre();
           ?>
      </td>
    </tr>
    <tr>
      <th>Rif:</th>
      <td><?php $Expositor->getRif() ?>
      </td>
    </tr>
    <tr>
      <th>Nombre de la Empresa:</th>
      <td><?php echo $Expositor->getNombreEmpresa() ?></td>
    </tr>
    <tr>
      <th>Nombre del Director:</th>
      <td><?php echo $Expositor->getNombreDirector() ?></td>
    </tr>
    <tr>
      <th>Nombre del Ejecutivo de Feria:</th>
      <td><?php echo $Expositor->getNombreEjecutivoFeria() ?></td>
    </tr>
    <tr>
      <th>Dirección:</th>
      <td><?php echo $Expositor->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Ciudad:</th>
      <td><?php echo $Expositor->getCiudad() ?></td>
    </tr>
    <tr>
      <th>Teléfono Local:</th>
      <td><?php echo $Expositor->getTelefonoLocal() ?></td>
    </tr>
    <tr>
      <th>Teléfono Celular:</th>
      <td><?php echo $Expositor->getTelefonoCelular() ?></td>
    </tr>
    <tr>
      <th>Fax:</th>
      <td><?php echo $Expositor->getFax() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $Expositor->getEmail() ?></td>
    </tr>
    <tr>
      <th>Portal Web:</th>
      <td><?php echo $Expositor->getSitioWeb() ?></td>
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
