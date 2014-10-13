<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $TipoActividad->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $TipoActividad->getNombre() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tipo_actividad/edit?id='.$TipoActividad->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('tipo_actividad/index') ?>">List</a>
