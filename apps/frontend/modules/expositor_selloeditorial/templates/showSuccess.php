<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ExpositorSelloeditorial->getId() ?></td>
    </tr>
    <tr>
      <th>Id feria:</th>
      <td><?php echo $ExpositorSelloeditorial->getIdFeria() ?></td>
    </tr>
    <tr>
      <th>Id expositor:</th>
      <td><?php echo $ExpositorSelloeditorial->getIdExpositor() ?></td>
    </tr>
    <tr>
      <th>Id sello editorial:</th>
      <td><?php echo $ExpositorSelloeditorial->getIdSelloEditorial() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('expositor_selloeditorial/edit?id='.$ExpositorSelloeditorial->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('expositor_selloeditorial/index') ?>">List</a>
