<h1>PagoExpositors List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Forma pago</th>
      <th>Deposito nacional</th>
      <th>Planilla deposito nacional</th>
      <th>Transferencia cuenta</th>
      <th>Banco emisor</th>
      <th>Numero transaccion</th>
      <th>Monto</th>
      <th>Id feria</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($PagoExpositors as $PagoExpositor): ?>
    <tr>
      <td><a href="<?php echo url_for('pago_expositor/show?id='.$PagoExpositor->getId()) ?>"><?php echo $PagoExpositor->getId() ?></a></td>
      <td><?php echo $PagoExpositor->getFormaPago() ?></td>
      <td><?php echo $PagoExpositor->getDepositoNacional() ?></td>
      <td><?php echo $PagoExpositor->getPlanillaDepositoNacional() ?></td>
      <td><?php echo $PagoExpositor->getTransferenciaCuenta() ?></td>
      <td><?php echo $PagoExpositor->getBancoEmisor() ?></td>
      <td><?php echo $PagoExpositor->getNumeroTransaccion() ?></td>
      <td><?php echo $PagoExpositor->getMonto() ?></td>
      <td><?php echo $PagoExpositor->getIdFeria() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('pago_expositor/new') ?>">New</a>
