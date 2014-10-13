<h1>Usuarios List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Cedula</th>
      <th>Isbn</th>
      <th>Login</th>
      <th>Contrasena</th>
      <th>Sf guard user</th>
      <th>Sexo</th>
      <th>Sf guard user group</th>
      <th>Correo</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Usuarios as $Usuario): ?>
    <tr>
      <td><a href="<?php echo url_for('usuario/show?id='.$Usuario->getId()) ?>"><?php echo $Usuario->getId() ?></a></td>
      <td><?php echo $Usuario->getNombre() ?></td>
      <td><?php echo $Usuario->getApellido() ?></td>
      <td><?php echo $Usuario->getCedula() ?></td>
      <td><?php echo $Usuario->getIsbn() ?></td>
      <td><?php echo $Usuario->getLogin() ?></td>
      <td><?php echo $Usuario->getContrasena() ?></td>
      <td><?php echo $Usuario->getSfGuardUser() ?></td>
      <td><?php echo $Usuario->getSexo() ?></td>
      <td><?php echo $Usuario->getSfGuardUserGroup() ?></td>
      <td><?php echo $Usuario->getCorreo() ?></td>
      <td><?php echo $Usuario->getTelefono() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('usuario/new') ?>">New</a>
