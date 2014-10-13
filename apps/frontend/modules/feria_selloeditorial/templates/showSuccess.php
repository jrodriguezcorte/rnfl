<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $FeriaSelloeditorial->getId() ?></td>
    </tr>
    <tr>
      <th>Id feria:</th>
      <td><?php echo $FeriaSelloeditorial->getIdFeria() ?></td>
    </tr>
    <tr>
      <th>Id selloeditorial:</th>
      <td><?php echo $FeriaSelloeditorial->getIdSelloeditorial() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('feria_selloeditorial/edit?id='.$FeriaSelloeditorial->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('feria_selloeditorial/index') ?>">List</a>
