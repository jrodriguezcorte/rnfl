<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $PonenteActividad->getId() ?></td>
    </tr>
    <tr>
      <th>Id ponente:</th>
      <td><?php echo $PonenteActividad->getIdPonente() ?></td>
    </tr>
    <tr>
      <th>Id actividad:</th>
      <td><?php echo $PonenteActividad->getIdActividad() ?></td>
    </tr>
    <tr>
      <th>Id feria:</th>
      <td><?php echo $PonenteActividad->getIdFeria() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('ponente_actividad/edit?id='.$PonenteActividad->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('ponente_actividad/index') ?>">List</a>
