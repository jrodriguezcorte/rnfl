<h1>Actividads List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Ejecutada</th>
      <th>Cantidad participantes m</th>
      <th>Cantidad participantes f</th>
      <th>Alcanzo tiempo</th>
      <th>Causas incumplimiento</th>
      <th>Observaciones</th>
      <th>Id tipo actividad</th>
      <th>Observacion tipo actividad</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Facilitador</th>
      <th>Id feria</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Actividads as $Actividad): ?>
    <tr>
      <td><a href="<?php echo url_for('actividad/show?id='.$Actividad->getId()) ?>"><?php echo $Actividad->getId() ?></a></td>
      <td><?php echo $Actividad->getNombre() ?></td>
      <td><?php echo $Actividad->getEjecutada() ?></td>
      <td><?php echo $Actividad->getCantidadParticipantesM() ?></td>
      <td><?php echo $Actividad->getCantidadParticipantesF() ?></td>
      <td><?php echo $Actividad->getAlcanzoTiempo() ?></td>
      <td><?php echo $Actividad->getCausasIncumplimiento() ?></td>
      <td><?php echo $Actividad->getObservaciones() ?></td>
      <td><?php echo $Actividad->getIdTipoActividad() ?></td>
      <td><?php echo $Actividad->getObservacionTipoActividad() ?></td>
      <td><?php echo $Actividad->getFecha() ?></td>
      <td><?php echo $Actividad->getHora() ?></td>
      <td><?php echo $Actividad->getFacilitador() ?></td>
      <td><?php echo $Actividad->getIdFeria() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('actividad/new') ?>">New</a>
