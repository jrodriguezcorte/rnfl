<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ExpositorLineaeditorial->getId() ?></td>
    </tr>
    <tr>
      <th>Id feria:</th>
      <td><?php echo $ExpositorLineaeditorial->getIdFeria() ?></td>
    </tr>
    <tr>
      <th>Id expositor:</th>
      <td><?php echo $ExpositorLineaeditorial->getIdExpositor() ?></td>
    </tr>
    <tr>
      <th>Linea editorial:</th>
      <td><?php echo $ExpositorLineaeditorial->getLineaEditorial() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('expositor_lineaeditorial/edit?id='.$ExpositorLineaeditorial->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('expositor_lineaeditorial/index') ?>">List</a>
