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
<hr />
<h2>Información de la solicitud</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>  
      <th>Nombre de la empresa:</th>
      <td><?php echo $ExpositorFeria->getNombeEmpresa() ?></td>
    </tr>
    <tr>
      <th>Procendencia:</th>
      <td><?php $ExpositorFeria->getProcedencia() == true ? $procendencia = "Internacional" : $procendencia = "Nacional"; 
                 echo $procendencia; ?></td>
    </tr>  
    <tr>
      <th>Tipo de Distribuidor:</th>
      <td><?php $Distribuidor = TipoDistribuidorQuery::create()->filterById($ExpositorFeria->getIdTipoDistribuidor())->findOne();
                echo $Distribuidor->getNombre();
      ?></td>
    </tr>  
    <tr>  
      <th>Sello editorial:</th>
      <td><?php echo $ExpositorFeria->getSelloEditorial() ?></td>
    </tr>    
    <tr>
      <th>Dirección:</th>
      <td><?php echo $ExpositorFeria->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Domicilio fiscal:</th>
      <td><?php echo $ExpositorFeria->getDomicilioFiscal() ?></td>
    </tr>    
    <tr>
      <th>Telefono local:</th>
      <td><?php echo $ExpositorFeria->getTelefonoLocal() ?></td>
    </tr>
    <tr>
      <th>Telefono celular:</th>
      <td><?php echo $ExpositorFeria->getTelefonoCelular() ?></td>
    </tr>
    <tr>
      <th>Fax:</th>
      <td><?php echo $ExpositorFeria->getFax() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $ExpositorFeria->getEmail() ?></td>
    </tr>
    <tr>
      <th>Portal web:</th>
      <td><?php echo $ExpositorFeria->getSitioWeb() ?></td>
    </tr>
    <tr>
      <th>Nombre del director:</th>
      <td><?php echo $ExpositorFeria->getNombreDirector() ?></td>
    </tr>
    <tr>
      <th>Nombre del representante legal:</th>
      <td><?php echo $ExpositorFeria->getRepresentanteLegal() ?></td>
    </tr>
    <tr>
      <th>Nombre ejecutivo de feria:</th>
      <td><?php echo $ExpositorFeria->getNombreEjecutivoFeria() ?></td>
    </tr>
    <tr>
      <th>Contacto:</th>
      <td><?php echo $ExpositorFeria->getContacto() ?></td>
    </tr>
    <tr>
      <th>Responsable del Stand:</th>
      <td><?php echo $ExpositorFeria->getResponsableStand() ?></td>
    </tr>    
    <tr>
      <th>Atención del Stand:</th>
      <td><?php echo $ExpositorFeria->getAtencionStand() ?></td>
    </tr>
    <tr>
      <th>Tipo de Stand:</th>
      <td><?php $Stand = StandQuery::create()->filterById($ExpositorFeria->getIdStand())->findOne();
            echo $Stand->getMetros().' m<sup>2</sup>' ?></td>
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
<?php echo link_to(image_tag('back.png'),"expositor_feria/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),"expositor_feria/edit?id_feria=".$id_feria."&id=".$id."&id_expositor=".$id_expositor,array('title' => 'Editar'))?>
<br>
<br>





