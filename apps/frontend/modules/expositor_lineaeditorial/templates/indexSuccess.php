<h1>ExpositorLineaeditorials List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id feria</th>
      <th>Id expositor</th>
      <th>Linea editorial</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ExpositorLineaeditorials as $ExpositorLineaeditorial): ?>
    <tr>
      <td><a href="<?php echo url_for('expositor_lineaeditorial/show?id='.$ExpositorLineaeditorial->getId()) ?>"><?php echo $ExpositorLineaeditorial->getId() ?></a></td>
      <td><?php echo $ExpositorLineaeditorial->getIdFeria() ?></td>
      <td><?php echo $ExpositorLineaeditorial->getIdExpositor() ?></td>
      <td><?php echo $ExpositorLineaeditorial->getLineaEditorial() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('expositor_lineaeditorial/new') ?>">New</a>
