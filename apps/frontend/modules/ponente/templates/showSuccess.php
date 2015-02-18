<?php 
    if ($sf_params->get('id_feria') == '') { 
     include_partial('usuario/menuinicial'); 
     $feria = '';
     $feria_edit = '';
    } else {
     include_partial('usuario/menuferia');
     $feria = '?id_feria='.$sf_params->get('id_feria');
     $feria_edit = '&id_feria='.$sf_params->get('id_feria');
    }
?>

<div class="jumbotron">
<h2>Detalle del Ponente</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Ponente->getNombre() ?></td>
    </tr>
    <tr>
      <th>Apellido:</th>
      <td><?php echo $Ponente->getApellido() ?></td>
    </tr>
    <tr>
      <th>Cédula:</th>
      <td><?php echo $Ponente->getCedula() ?></td>
    </tr>
    <tr>
      <th>Rif:</th>
      <td><?php echo $Ponente->getRif() ?></td>
    </tr>
    <tr>
      <th>Sexo:</th>
      <td><?php echo $Ponente->getSexo() ?></td>
    </tr>
    <tr>
      <th>País:</th>
      <td><?php echo $Ponente->getPais() ?></td>
    </tr>
    <tr>
      <th>Teléfono local:</th>
      <td><?php echo $Ponente->getTelefonoLocal() ?></td>
    </tr>
    <tr>
      <th>Teléfono celular:</th>
      <td><?php echo $Ponente->getTelefonoCelular() ?></td>
    </tr>
    <tr>
      <th>Correo electrónico:</th>
      <td><?php echo $Ponente->getEmail() ?></td>
    </tr>
    <tr>
      <th>Observaciones:</th>
      <td><?php echo $Ponente->getObservaciones() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'ponente/index'.$feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'ponente/edit?id='.$Ponente->getId().$feria_edit,array('title' => 'Editar'))?>
</div>


