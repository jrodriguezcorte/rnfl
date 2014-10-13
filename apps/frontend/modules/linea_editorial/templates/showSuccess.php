<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $LineaEditorial->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $LineaEditorial->getNombre() ?></td>
    </tr>
    <tr>
      <th>Observaciones:</th>
      <td><?php echo $LineaEditorial->getObservaciones() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('linea_editorial/edit?id='.$LineaEditorial->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('linea_editorial/index') ?>">List</a>
