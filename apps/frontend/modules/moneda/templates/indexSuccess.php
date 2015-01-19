<h1>Monedas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Simbolo</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Monedas as $Moneda): ?>
    <tr>
      <td><a href="<?php echo url_for('moneda/show?id='.$Moneda->getId()) ?>"><?php echo $Moneda->getId() ?></a></td>
      <td><?php echo $Moneda->getNombre() ?></td>
      <td><?php echo $Moneda->getSimbolo() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('moneda/new') ?>">New</a>
