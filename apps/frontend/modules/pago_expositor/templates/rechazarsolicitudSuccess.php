<?php use_javascript('humanmsg') ?>
<?php use_stylesheet('humanmsg') ?>
<?php use_javascript('modules/expositor_feria') ?>
<?php include_partial('usuario/menuferia') ?>
<div class="jumbotron">
<form id="formulario" action="/pago_expositor/esrechazada" method="post" >
<div class="table-responsive">
    <center><h3>¿Está seguro de que desea rechazar dicha solicitud?</h3></center>   
    <br>
    <center><b>En caso afirmativo, indique los motivos</b></center>
  <table class="table">
    <tfoot>
     <tr>
         <td>
             &nbsp;
         </td>
         <td>
            <center><textarea type="text" id="observaciones" name="observaciones" rows="6" cols="70"></textarea></center>
            <br>
            <input name="id_feria"  style="visibility:hidden" value="<?php echo $sf_params->get('id_feria'); ?>">
            <br>
            <input name="id_expositor"  style="visibility:hidden" value="<?php echo $sf_params->get('id_expositor'); ?>">
            <br>
            <input name="id_expositor_feria"  style="visibility:hidden" value="<?php echo $sf_params->get('id_expositor_feria'); ?>">
            <input name="id"  style="visibility:hidden" value="<?php echo $sf_params->get('id'); ?>">
        </td>
     </tr>  
      <tr>
        <td colspan="2">
          <center><input type="submit" value="Guardar" /></center>
        </td>
      </tr>
    </tfoot>
  </table>
</div>    
</form>
<hr />
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"expositor_feria/pagoregistrado?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<br>
<br>
</div>
<br>