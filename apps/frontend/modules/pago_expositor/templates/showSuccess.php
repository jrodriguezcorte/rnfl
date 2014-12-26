<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $PagoExpositor->getId() ?></td>
    </tr>
    <tr>
      <th>Forma pago:</th>
      <td><?php echo $PagoExpositor->getFormaPago() ?></td>
    </tr>
    <tr>
      <th>Deposito nacional:</th>
      <td><?php echo $PagoExpositor->getDepositoNacional() ?></td>
    </tr>
    <tr>
      <th>Planilla deposito nacional:</th>
      <td><?php echo $PagoExpositor->getPlanillaDepositoNacional() ?></td>
    </tr>
    <tr>
      <th>Transferencia cuenta:</th>
      <td><?php echo $PagoExpositor->getTransferenciaCuenta() ?></td>
    </tr>
    <tr>
      <th>Banco emisor:</th>
      <td><?php echo $PagoExpositor->getBancoEmisor() ?></td>
    </tr>
    <tr>
      <th>Numero transaccion:</th>
      <td><?php echo $PagoExpositor->getNumeroTransaccion() ?></td>
    </tr>
    <tr>
      <th>Monto:</th>
      <td><?php echo $PagoExpositor->getMonto() ?></td>
    </tr>
    <tr>
      <th>Id feria:</th>
      <td><?php echo $PagoExpositor->getIdFeria() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('pago_expositor/edit?id='.$PagoExpositor->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('pago_expositor/index') ?>">List</a>
