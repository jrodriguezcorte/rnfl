<h1>ExpositorFerias List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id feria</th>
      <th>Id expositor</th>
      <th>Nombe empresa</th>
      <th>Nombre director</th>
      <th>Nombre ejecutivo feria</th>
      <th>Direccion</th>
      <th>Ciudad</th>
      <th>Id pais</th>
      <th>Telefono local</th>
      <th>Telefono celular</th>
      <th>Fax</th>
      <th>Email</th>
      <th>Sitio web</th>
      <th>Tipo expositor</th>
      <th>Otro tipo expositor</th>
      <th>Numero stand</th>
      <th>Costo stand</th>
      <th>Metros stand</th>
      <th>Otro linea editorial</th>
      <th>Libro mas vendido</th>
      <th>Costo libro</th>
      <th>Cantidad libro vendido</th>
      <th>Observaciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ExpositorFerias as $ExpositorFeria): ?>
    <tr>
      <td><a href="<?php echo url_for('expositor_feria/show?id='.$ExpositorFeria->getId()) ?>"><?php echo $ExpositorFeria->getId() ?></a></td>
      <td><?php echo $ExpositorFeria->getIdFeria() ?></td>
      <td><?php echo $ExpositorFeria->getIdExpositor() ?></td>
      <td><?php echo $ExpositorFeria->getNombeEmpresa() ?></td>
      <td><?php echo $ExpositorFeria->getNombreDirector() ?></td>
      <td><?php echo $ExpositorFeria->getNombreEjecutivoFeria() ?></td>
      <td><?php echo $ExpositorFeria->getDireccion() ?></td>
      <td><?php echo $ExpositorFeria->getCiudad() ?></td>
      <td><?php echo $ExpositorFeria->getIdPais() ?></td>
      <td><?php echo $ExpositorFeria->getTelefonoLocal() ?></td>
      <td><?php echo $ExpositorFeria->getTelefonoCelular() ?></td>
      <td><?php echo $ExpositorFeria->getFax() ?></td>
      <td><?php echo $ExpositorFeria->getEmail() ?></td>
      <td><?php echo $ExpositorFeria->getSitioWeb() ?></td>
      <td><?php echo $ExpositorFeria->getTipoExpositor() ?></td>
      <td><?php echo $ExpositorFeria->getOtroTipoExpositor() ?></td>
      <td><?php echo $ExpositorFeria->getNumeroStand() ?></td>
      <td><?php echo $ExpositorFeria->getCostoStand() ?></td>
      <td><?php echo $ExpositorFeria->getMetrosStand() ?></td>
      <td><?php echo $ExpositorFeria->getOtroLineaEditorial() ?></td>
      <td><?php echo $ExpositorFeria->getLibroMasVendido() ?></td>
      <td><?php echo $ExpositorFeria->getCostoLibro() ?></td>
      <td><?php echo $ExpositorFeria->getCantidadLibroVendido() ?></td>
      <td><?php echo $ExpositorFeria->getObservaciones() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('expositor_feria/new') ?>">New</a>
