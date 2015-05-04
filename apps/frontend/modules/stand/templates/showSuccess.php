<?php include_partial('usuario/menuferia') ?>
<?php
$miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
$Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
$sf_guard_user = $Usuario->getSfGuardUserGroup();
?>
<?php $id_feria = $sf_params->get('id_feria'); 
    $Feria = FeriaQuery::create()->filterById($id_feria)->findOne();
?>
<div class="jumbotron">
    <p align="right">
        <?php echo link_to(image_tag('back.png'),"stand/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
        &nbsp;
        <?php 
        if ($sf_guard_user == 1 || ($sf_guard_user == 2 && ($Feria->getIdUsuario() == $Usuario->getId()))) {
        ?>
        <?php echo link_to(image_tag('edit.png'),"stand/edit?id_feria=".$id_feria."&id=".$Stand->getId(),array('title' => 'Editar'))?>
        <?php } ?>        
    </p>     
<h2>Detalle del Stand</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>
      <th>Metros:</th>
      <td><?php echo $Stand->getMetros() ?></td>
    </tr>
    <tr>
      <th>Costo en Bs:</th>
      <td><?php echo $Stand->getCostoBs() ?></td>
    </tr>
    <tr>
      <th>Costo en USD:</th>
      <td><?php echo $Stand->getCostoDs() ?></td>
    </tr>    
  </tbody>
</table>
</div>
<hr />
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"stand/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php 
if ($sf_guard_user == 1 || ($sf_guard_user == 2 && ($Feria->getIdUsuario() == $Usuario->getId()))) {
?>
<?php echo link_to(image_tag('edit.png'),"stand/edit?id_feria=".$id_feria."&id=".$Stand->getId(),array('title' => 'Editar'))?>
<?php } ?>
<br>
<br>

