<h1>PonenteActividads List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id ponente</th>
      <th>Id actividad</th>
      <th>Id feria</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($PonenteActividads as $PonenteActividad): ?>
    <tr>
      <td><a href="<?php echo url_for('ponente_actividad/show?id='.$PonenteActividad->getId()) ?>"><?php echo $PonenteActividad->getId() ?></a></td>
      <td><?php echo $PonenteActividad->getIdPonente() ?></td>
      <td><?php echo $PonenteActividad->getIdActividad() ?></td>
      <td><?php echo $PonenteActividad->getIdFeria() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('ponente_actividad/new') ?>">New</a>
