<?php include_partial('usuario/menuferia') ?>
<?php $id_feria = $sf_params->get('id_feria'); 
       $id_expositor = $sf_params->get('id_expositor');
       $id = $sf_params->get('id'); 
       $Expositor = ExpositorQuery::create()->filterById($id_expositor)->findOne();
       $ExpositorFeria = ExpositorFeriaQuery::create()->filterById($PagoExpositor->getIdExpositorFeria())->findOne();
?>
<div class="jumbotron">
    <p align="right">
        <?php echo link_to(image_tag('back.png'),"expositor_feria/pagoregistrado?id_feria=".$id_feria,array('title' => 'Ver listado'))?>        
    </p>    
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
<hr />
<h2>Información del pago realizado</h2>
<br>
<?php
   $forma_pago = $PagoExpositor->getEsPagoBancoNacional();
   
   if ($forma_pago) {
?>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>  
      <th>Forma de Pago:</th>
      <td><?php echo 'Internacional' ?></td>
    </tr>
    <tr>
      <th>N° Depósito:</th>
      <td><?php echo $PagoExpositor->getNumeroDeposito(); ?></td>
    </tr>  
    <tr>
      <th>Fecha:</th>
      <td><?php echo implode("-", array_reverse(explode("-", $PagoExpositor->getFechaPago()))); ?></td>
    </tr>  
    <tr>  
      <th>Monto:</th>
      <?php 
                 $Banco = BancoQuery::create()
                      ->orderById('desc')                     
                      ->where('Banco.Id = ?', $PagoExpositor->getIdBanco())    
                      ->findOne(); 
                 $Moneda = MonedaQuery::create()->filterById($Banco->getIdMoneda())->findOne();      
      ?>
      <td><?php echo $PagoExpositor->getMonto().' '.$Moneda->getSimbolo(); ?></td>
    </tr>
  </tbody>
  </table>
</div>    
<?php
   } else {
?>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>  
      <th>Forma de Pago:</th>
      <td><?php echo 'Nacional' ?></td>
    </tr>
    <tr>
      <th>N° Depósito:</th>
      <td><?php echo $PagoExpositor->getNumeroDeposito(); ?></td>
    </tr>  
    <tr>
      <th>Fecha:</th>
      <td><?php echo implode("-", array_reverse(explode("-", $PagoExpositor->getFechaPago()))); ?></td>
    </tr>  
    <tr>  
      <th>Monto:</th>
      <td><?php echo $PagoExpositor->getMonto().' Bs'; ?></td>
    </tr>
  </tbody>
  </table>
</div>   
<?php
   }
?>
<br>
<?php echo link_to(image_tag('back.png'),"expositor_feria/pagoregistrado?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<br>
<br>