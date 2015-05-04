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
        <?php echo link_to(image_tag('back.png'),"actividad/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
        &nbsp;
        <?php 
        if ($sf_guard_user == 1 || ($sf_guard_user == 2 && ($Feria->getIdUsuario() == $Usuario->getId()))) {
        ?>
        <?php echo link_to(image_tag('edit.png'),"actividad/edit?id_feria=".$id_feria."&id=".$Actividad->getId(),array('title' => 'Editar'))?>
        <?php } ?>        
    </p>     
<h2>Detalle de la Actividad</h2>
<br>
<div class="table-responsive">
    <br>
  <table class="table">      
  <tbody>
    <tr>
      <th>Título de la Actividad:</th>
      <td><?php echo $Actividad->getTitulo() ?></td>
    </tr> 
    <tr>
      <th>Nombre de la empresa:</th>
      <td><?php echo $Actividad->getNombreEmpresa() ?></td>
    </tr>
    <tr>
      <th>Dirección:</th>
      <td><?php echo $Actividad->getNombreEmpresa() ?></td>
    </tr>
    <tr>
      <th>Nombre del Solicitante:</th>
      <td><?php echo $Actividad->getNombreSolicitante() ?></td>
    </tr>
    <tr>
      <th>Nombre del Representante:</th>
      <td><?php echo $Actividad->getNombreRepresentante() ?></td>
    </tr>  
    <tr>
      <th>Teléfono Local:</th>
      <td><?php echo $Actividad->getTelefonoLocal() ?></td>
    </tr>
    <tr>
      <th>Teléfono Celular:</th>
      <td><?php echo $Actividad->getTelefonoCelular() ?></td>
    </tr>    
    <tr>
      <th>Fax:</th>
      <td><?php echo $Actividad->getFax() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $Actividad->getEmail() ?></td>
    </tr>    
    <tr>
      <th>Tipo de actividad:</th>
      <td><?php $TipoActividad = TipoActividadQuery::create()->filterById($Actividad->getIdTipoActividad())->findOne();
                echo $TipoActividad->getNombre() ?>
      </td>    
    </tr>    
    <tr>
      <th>Autor:</th>
      <td><?php echo $Actividad->getAutor() ?></td>
    </tr>   
    <?php if ($Actividad->getIdTipoActividad() == 1) { ?> 
    <tr>
      <th>Editorial:</th>
      <td><?php echo $Actividad->getEditorial() ?></td>
    </tr>
    <tr>
      <th>¿Estuvo presente el autor?:</th>
      <td><?php  $Actividad->getPresenteAutor() == true ? $alcanzo = "Sí" : $alcanzo = "No"; 
                 echo $alcanzo;
           ?>
      </td>
    </tr>    
    <?php } ?>   
    <tr>
      <th>Descripción de la Actividad:</th>
      <td><?php echo $Actividad->getDescripcionActividad() ?></td>
    </tr>
    <tr>
      <th>Público dirigido:</th>
      <td><?php echo $Actividad->getPublicoDirigido() ?></td>
    </tr>
    <tr>
      <th>Número de ponentes:</th>
      <td><?php echo $Actividad->getNumeroPonentes() ?></td>
    </tr>    
    <tr>
      <th>¿Actividad Cerrada?:</th>
      <td><?php  $Actividad->getActividadCerrada() == true ? $alcanzo = "Sí" : $alcanzo = "No"; 
                 echo $alcanzo;
           ?>
      </td>
    </tr>     
  </tbody>
</table>
</div>
<hr />
<br>
    <?php $id_feria = $sf_params->get('id_feria'); ?>
    <?php $id_actividad = $sf_params->get('id'); ?>
<?php
       $PonenteActividads = PonenteActividadQuery::create()
               ->filterByIdFeria($id_feria)
               ->filterByIdActividad($id_actividad)
               ->find(); 
   if (count($PonenteActividads) > 0) {
?>
<h2>Listado de Ponentes Asociados a la Actividad</h2>
<br>    
<table width="100%" border="1">
    <tr>
        <td><b>Nombre</b></td>
        <td><b>Apellido</b></td>
        <td><b>Cédula</b></td>
        <td><b>Rif</b></td>
        <td><b>Email</b></td>
        <td><b>Teléfono Local</b></td>
        <td><b>Teléfono Celular</b></td>    
    </tr>
<?php
    foreach ($PonenteActividads as $PonenteActividad) {
        
        $id_ponente = $PonenteActividad->getIdPonente();
        $Ponente = PonenteQuery::create()->filterById($id_ponente)->findOne();
?>
    <tr>
        <td><?php echo $Ponente->getNombre() ?></td>
        <td><?php echo $Ponente->getApellido() ?></td>
        <td><?php echo $Ponente->getCedula() ?></td>
        <td><?php echo $Ponente->getRif() ?></td>
        <td><?php echo $Ponente->getEmail() ?></td>
        <td><?php echo $Ponente->getTelefonoLocal() ?></td>
        <td><?php echo $Ponente->getTelefonoCelular() ?></td>
    </tr>
<?php 
    }  
?>        
</table>
<br>
<br>
<?php
   }
?>

    <p>
        <?php echo link_to(image_tag('back.png'),"actividad/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
        &nbsp;
        <?php 
        if ($sf_guard_user == 1 || ($sf_guard_user == 2 && ($Feria->getIdUsuario() == $Usuario->getId()))) {
        ?>
        <?php echo link_to(image_tag('edit.png'),"actividad/edit?id_feria=".$id_feria."&id=".$Actividad->getId(),array('title' => 'Editar'))?>
        <?php } ?>        
    </p>
    <br>
<br>

