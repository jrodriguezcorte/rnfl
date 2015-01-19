<?php include_partial('usuario/menuferia') ?>
<?php 
        $id_expositor = $ExpositorFeria->getIdExpositor();
        $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
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
<hr />
<h2>Información de la solicitud</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>
      <th>Característica del Expositor:</th>
      <td><?php $Distribuidor = TipoDistribuidorQuery::create()->filterById($ExpositorFeria->getIdTipoDistribuidor())->findOne();
                echo $Distribuidor->getNombre();
      ?></td>
    </tr>  
    <tr>  
      <th>Sello editorial:</th>
      <td><?php echo $ExpositorFeria->getSelloEditorial() ?></td>
    </tr>    
    <tr>
      <th>Domicilio fiscal:</th>
      <td><?php echo $ExpositorFeria->getDomicilioFiscal() ?></td>
    </tr>    
    <tr>
      <th>Responsable del Stand:</th>
      <td><?php echo $ExpositorFeria->getResponsableStand() ?></td>
    </tr>    
    <tr>
      <th>Tipo de Stand:</th>
      <td><?php $Stand = StandQuery::create()->filterById($ExpositorFeria->getIdStand())->findOne();
            if (count($Stand) > 0) {
                echo $Stand->getMetros().' m<sup>2</sup>'; 
            }        
          ?></td>
    </tr>    
    <tr>
      <th>N° de títulos:</th>
      <td><?php echo $ExpositorFeria->getNumeroTitulos() ?></td>
    </tr>
    <tr>
      <th>N° de novedades:</th>
      <td><?php echo $ExpositorFeria->getNumeroNovedades() ?></td>
    </tr>
    <tr>
      <th>Observaciones:</th>
      <td><?php echo $ExpositorFeria->getObservaciones() ?></td>
    </tr>
  </tbody>
</table>
</div>
<br>
<?php $id_feria = $sf_params->get('id_feria'); 
       $id_expositor = $sf_params->get('id_expositor');
       $id = $sf_params->get('id');
?>
<?php echo link_to(image_tag('back.png'),"expositor_feria/espera?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),"expositor_feria/edit?id_feria=".$id_feria."&id=".$id."&id_expositor=".$id_expositor,array('title' => 'Editar'))?>
<br>
<br>





