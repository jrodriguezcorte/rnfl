<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
<h2>Información básica del expositor</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>
      <th>Nombre y Apellido:</th>
      <td><?php echo $Expositor->getNombre().'  '.$Expositor->getApellido() ?></td>
    </tr>
    <tr>
      <th>Cédula:</th>
      <td><?php $Expositor->getCedula() ?>
      </td>
    </tr>
    <tr>
      <th>Rif:</th>
      <td><?php $Expositor->getRif() ?>
      </td>
    </tr>
    <tr>
      <th>País:</th>
      <td><?php  $Pais = PaisQuery::create()->filterById($Expositor->getIdPais())->findOne();
                  echo $Pais->getNombre();
           ?>
      </td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<br>
<br>
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"expositor/indexexp?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;

