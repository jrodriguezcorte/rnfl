<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $ExpositorFeria->getId() ?></td>
    </tr>
    <tr>
      <th>Id feria:</th>
      <td><?php echo $ExpositorFeria->getIdFeria() ?></td>
    </tr>
    <tr>
      <th>Id expositor:</th>
      <td><?php echo $ExpositorFeria->getIdExpositor() ?></td>
    </tr>
    <tr>
      <th>Nombe empresa:</th>
      <td><?php echo $ExpositorFeria->getNombeEmpresa() ?></td>
    </tr>
    <tr>
      <th>Nombre director:</th>
      <td><?php echo $ExpositorFeria->getNombreDirector() ?></td>
    </tr>
    <tr>
      <th>Nombre ejecutivo feria:</th>
      <td><?php echo $ExpositorFeria->getNombreEjecutivoFeria() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $ExpositorFeria->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Ciudad:</th>
      <td><?php echo $ExpositorFeria->getCiudad() ?></td>
    </tr>
    <tr>
      <th>Id pais:</th>
      <td><?php echo $ExpositorFeria->getIdPais() ?></td>
    </tr>
    <tr>
      <th>Telefono local:</th>
      <td><?php echo $ExpositorFeria->getTelefonoLocal() ?></td>
    </tr>
    <tr>
      <th>Telefono celular:</th>
      <td><?php echo $ExpositorFeria->getTelefonoCelular() ?></td>
    </tr>
    <tr>
      <th>Fax:</th>
      <td><?php echo $ExpositorFeria->getFax() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $ExpositorFeria->getEmail() ?></td>
    </tr>
    <tr>
      <th>Sitio web:</th>
      <td><?php echo $ExpositorFeria->getSitioWeb() ?></td>
    </tr>
    <tr>
      <th>Tipo expositor:</th>
      <td><?php echo $ExpositorFeria->getTipoExpositor() ?></td>
    </tr>
    <tr>
      <th>Otro tipo expositor:</th>
      <td><?php echo $ExpositorFeria->getOtroTipoExpositor() ?></td>
    </tr>
    <tr>
      <th>Numero stand:</th>
      <td><?php echo $ExpositorFeria->getNumeroStand() ?></td>
    </tr>
    <tr>
      <th>Costo stand:</th>
      <td><?php echo $ExpositorFeria->getCostoStand() ?></td>
    </tr>
    <tr>
      <th>Metros stand:</th>
      <td><?php echo $ExpositorFeria->getMetrosStand() ?></td>
    </tr>
    <tr>
      <th>Otro linea editorial:</th>
      <td><?php echo $ExpositorFeria->getOtroLineaEditorial() ?></td>
    </tr>
    <tr>
      <th>Libro mas vendido:</th>
      <td><?php echo $ExpositorFeria->getLibroMasVendido() ?></td>
    </tr>
    <tr>
      <th>Costo libro:</th>
      <td><?php echo $ExpositorFeria->getCostoLibro() ?></td>
    </tr>
    <tr>
      <th>Cantidad libro vendido:</th>
      <td><?php echo $ExpositorFeria->getCantidadLibroVendido() ?></td>
    </tr>
    <tr>
      <th>Observaciones:</th>
      <td><?php echo $ExpositorFeria->getObservaciones() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('expositor_feria/edit?id='.$ExpositorFeria->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('expositor_feria/index') ?>">List</a>
