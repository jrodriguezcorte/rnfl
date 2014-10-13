<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Usuario->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Usuario->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $Usuario->getApellido() ?></td>
    </tr>
    <tr>
      <th>Cedula:</th>
      <td><?php echo $Usuario->getCedula() ?></td>
    </tr>
    <tr>
      <th>Isbn:</th>
      <td><?php echo $Usuario->getIsbn() ?></td>
    </tr>
    <tr>
      <th>Login:</th>
      <td><?php echo $Usuario->getLogin() ?></td>
    </tr>
    <tr>
      <th>Contrasena:</th>
      <td><?php echo $Usuario->getContrasena() ?></td>
    </tr>
    <tr>
      <th>Sf guard user:</th>
      <td><?php echo $Usuario->getSfGuardUser() ?></td>
    </tr>
    <tr>
      <th>Sexo:</th>
      <td><?php echo $Usuario->getSexo() ?></td>
    </tr>
    <tr>
      <th>Sf guard user group:</th>
      <td><?php echo $Usuario->getSfGuardUserGroup() ?></td>
    </tr>
    <tr>
      <th>Correo:</th>
      <td><?php echo $Usuario->getCorreo() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $Usuario->getTelefono() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('usuario/edit?id='.$Usuario->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('usuario/index') ?>">List</a>
