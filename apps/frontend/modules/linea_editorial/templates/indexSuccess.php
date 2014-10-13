<h1>LineaEditorials List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Observaciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($LineaEditorials as $LineaEditorial): ?>
    <tr>
      <td><a href="<?php echo url_for('linea_editorial/show?id='.$LineaEditorial->getId()) ?>"><?php echo $LineaEditorial->getId() ?></a></td>
      <td><?php echo $LineaEditorial->getNombre() ?></td>
      <td><?php echo $LineaEditorial->getObservaciones() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('linea_editorial/new') ?>">New</a>
