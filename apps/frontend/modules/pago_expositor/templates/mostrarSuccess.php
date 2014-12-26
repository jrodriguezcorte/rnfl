<?php include_partial('usuario/menuferia') ?>
<?php 
        $id_feria = $sf_params->get('id_feria');
        $id_expositor = $sf_params->get('id_expositor');
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
<h2>Información del pago realizado</h2>
<br>
<?php
   $forma_pago = $PagoExpositor->getFormaPago();
   
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
      <th>N° Transferencia:</th>
      <td><?php echo $PagoExpositor->getTransferenciaCuenta(); ?></td>
    </tr>  
    <tr>
      <th>Banco Emisor:</th>
      <td><?php echo $PagoExpositor->getBancoEmisor();?></td>
    </tr>  
    <tr>  
      <th>Monto:</th>
      <td><?php echo $PagoExpositor->getMonto().' $'; ?></td>
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
      <th>Depósito Nacional:</th>
      <td><?php echo $PagoExpositor->getDepositoNacional(); ?></td>
    </tr>  
    <tr>
      <th>Planilla de Depósito Nacional:</th>
      <td><?php echo $PagoExpositor->getPlanillaDepositoNacional();?></td>
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