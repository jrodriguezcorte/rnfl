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
        <?php echo link_to(image_tag('back.png'),"cuenta/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
        &nbsp;
        <?php 
        if ($sf_guard_user == 1 || ($sf_guard_user == 2 && ($Feria->getIdUsuario() == $Usuario->getId()))) {
        ?>
        <?php echo link_to(image_tag('edit.png'),"cuenta/edit?id_feria=".$id_feria."&id=".$Cuenta->getId(),array('title' => 'Editar'))?>
        <?php } ?>        
    </p>    
<h2>Detalle de la Cuenta</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>
      <th>Banco:</th>
      <td><?php $id_banco = $Cuenta->getIdBanco(); 
            $Banco = BancoQuery::create()->filterById($id_banco)->findOne();
            echo $Banco->getNombre(); ?></td>
    </tr>
    <tr>
      <th>Número de Cuenta:</th>
      <td><?php echo $Cuenta->getNumero() ?></td>
    </tr>
    <tr>
      <th>Swift:</th>
      <td><?php echo $Cuenta->getSwift() ?></td>
    </tr>
    <tr>
      <th>Aba:</th>
      <td><?php echo $Cuenta->getAba() ?></td>
    </tr>
    <tr>
      <th>Beneficiario:</th>
      <td><?php echo $Cuenta->getBeneficiario() ?></td>
    </tr>
  </tbody>
</table>
</div>
<hr />

<?php echo link_to(image_tag('back.png'),"cuenta/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php 
if ($sf_guard_user == 1 || ($sf_guard_user == 2 && ($Feria->getIdUsuario() == $Usuario->getId()))) {
?>
<?php echo link_to(image_tag('edit.png'),"cuenta/edit?id_feria=".$id_feria."&id=".$Cuenta->getId(),array('title' => 'Editar'))?>
<?php } ?>
<br>
<br>

