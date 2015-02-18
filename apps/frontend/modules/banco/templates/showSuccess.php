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
<h2>Detalle del Banco</h2>
<br>
<div class="table-responsive">
  <table class="table">
  <tbody>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Banco->getNombre() ?></td>
    </tr>
    <tr>
      <th>País:</th>
      <td><?php $Pais = PaisQuery::create()->filterById($Banco->getIdPais())->findOne();
                echo $Pais->getNombre() ?>
      </td>
    </tr>
  </tbody>
</table>
</div>
<hr />
<?php echo link_to(image_tag('back.png'),'banco/index'.$feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php echo link_to(image_tag('edit.png'),'banco/edit?id='.$Banco->getId().$feria_edit,array('title' => 'Editar'))?>
</div>
