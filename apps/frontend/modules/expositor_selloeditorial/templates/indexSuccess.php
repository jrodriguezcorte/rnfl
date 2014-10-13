<h1>ExpositorSelloeditorials List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id feria</th>
      <th>Id expositor</th>
      <th>Id sello editorial</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ExpositorSelloeditorials as $ExpositorSelloeditorial): ?>
    <tr>
      <td><a href="<?php echo url_for('expositor_selloeditorial/show?id='.$ExpositorSelloeditorial->getId()) ?>"><?php echo $ExpositorSelloeditorial->getId() ?></a></td>
      <td><?php echo $ExpositorSelloeditorial->getIdFeria() ?></td>
      <td><?php echo $ExpositorSelloeditorial->getIdExpositor() ?></td>
      <td><?php echo $ExpositorSelloeditorial->getIdSelloEditorial() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('expositor_selloeditorial/new') ?>">New</a>
