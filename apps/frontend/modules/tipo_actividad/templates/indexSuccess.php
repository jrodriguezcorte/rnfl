<h1>TipoActividads List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($TipoActividads as $TipoActividad): ?>
    <tr>
      <td><a href="<?php echo url_for('tipo_actividad/show?id='.$TipoActividad->getId()) ?>"><?php echo $TipoActividad->getId() ?></a></td>
      <td><?php echo $TipoActividad->getNombre() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tipo_actividad/new') ?>">New</a>
