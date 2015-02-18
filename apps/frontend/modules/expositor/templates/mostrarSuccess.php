<?php 
    if ($sf_params->get('id_feria') == '') { 
     include_partial('usuario/menuinicial'); 
     $feria = '';
     $feria_edit = '';
    } else {
     include_partial('usuario/menuferia');
     $feria = '?id_feria='.$sf_params->get('id_feria');
     $feria_edit = '&id_feria='.$sf_params->get('id_feria');
    }
?>

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
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"expositor/indexexp?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
<?php echo link_to(image_tag('edit.png'),"expositor/edit?id=".$Expositor->getId().$feria_edit,array('title' => 'Editar'))?>
&nbsp;

