<?php include_partial('usuario/menuferia') ?>

<div class="jumbotron">
<h2>Detalle de la Actividad</h2>
<br>
<div class="table-responsive">
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
<?php if (count($ActividadFinalizada) > 0)  { ?>
<hr />
<h2>Detalle de la Actividad Finalizada</h2>
<br>
<div class="table-responsive">
  <table class="table">      
  <tbody>
    <tr>
      <th>Nombre del Responsable:</th>
      <td><?php echo $ActividadFinalizada->getNombreResponsable() ?></td>
    </tr> 
    <tr>
      <th>Fecha de Ejecución:</th>
      <td><?php echo implode("-", array_reverse(explode("-", $ActividadFinalizada->getFechaEjecucion()))); ?></td>
    </tr>
    <tr>
      <th>Hora de Ejecución:</th>
      <td><?php echo $ActividadFinalizada->getHoraEjecucion() ?></td>
    </tr>
    <tr>
      <th>Hora Final de Ejecución:</th>
      <td><?php echo $ActividadFinalizada->getHoraFinEjecucion() ?></td>
    </tr>
    <tr>
      <th>Cantidad de Participantes Masculinos:</th>
      <td><?php echo $ActividadFinalizada->getParticipantesM() ?></td>
    </tr>  
    <tr>
      <th>Cantidad de Participantes Femeninos:</th>
      <td><?php echo $ActividadFinalizada->getParticipantesF() ?></td>
    </tr>
    <tr>
      <th>Cantidad Total de Participantes</th>
      <td><?php echo $ActividadFinalizada->getTotal() ?></td>
    </tr>    
    <tr>
      <th>¿Fue un Evento Público?:</th>
      <td><?php echo $ActividadFinalizada->getEventoPublico() ?></td>
    </tr>
    <tr>
      <th>Nombre de la Institución:</th>
      <td><?php echo $ActividadFinalizada->getNombreInstitucion() ?></td>
    </tr>    
    <tr>
      <th>País:</th>
      <td><?php $Pais = PaisQuery::create()->filterById($ActividadFinalizada->getIdPais())->findOne();
                echo $Pais->getNombre() ?></td>
    </tr>
    <tr>
      <th>Estado:</th>
      <td><?php $Estado = EstadoQuery::create()->filterById($ActividadFinalizada->getIdEstado())->findOne();
                echo $Estado->getNombre() ?></td>
    </tr>
    <tr>
      <th>Municipio:</th>
      <td><?php $Municipio = MunicipioQuery::create()->filterById($ActividadFinalizada->getIdMunicipio())->findOne();
                echo $Municipio->getNombre() ?></td>
    </tr>
    <tr>
      <th>Parroquia:</th>
      <td><?php $Parroquia = ParroquiaQuery::create()->filterById($ActividadFinalizada->getIdParroquia())->findOne();
                echo $Parroquia->getNombre() ?></td>
    </tr>
    <tr>
      <th>Región:</th>
      <td><?php $Region = RegionQuery::create()->filterById($ActividadFinalizada->getIdRegion())->findOne();
                echo $Region->getNombre() ?></td>
    </tr>        
  </tbody>
</table>
</div>
<hr />
<br>
<?php } ?> 





<?php echo link_to(image_tag('back.png'),"actividad_finalizada/index?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<?php if (count($ActividadFinalizada) > 0)  { ?>
<?php echo link_to(image_tag('edit.png'),"actividad_finalizada/edit?id_feria=".$id_feria."&id=".$ActividadFinalizada->getId(),array('title' => 'Editar'))?>
<?php } ?>
<br>
<br>

