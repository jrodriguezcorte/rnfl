<h1>FeriaSelloeditorials List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id feria</th>
      <th>Id selloeditorial</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($FeriaSelloeditorials as $FeriaSelloeditorial): ?>
    <tr>
      <td><a href="<?php echo url_for('feria_selloeditorial/show?id='.$FeriaSelloeditorial->getId()) ?>"><?php echo $FeriaSelloeditorial->getId() ?></a></td>
      <td><?php echo $FeriaSelloeditorial->getIdFeria() ?></td>
      <td><?php echo $FeriaSelloeditorial->getIdSelloeditorial() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('feria_selloeditorial/new') ?>">New</a>
