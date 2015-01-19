<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Moneda->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Moneda->getNombre() ?></td>
    </tr>
    <tr>
      <th>Simbolo:</th>
      <td><?php echo $Moneda->getSimbolo() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('moneda/edit?id='.$Moneda->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('moneda/index') ?>">List</a>
