<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('humanmsg') ?>
<?php use_stylesheet('humanmsg') ?>
<?php use_javascript('modules/feria') ?>
<?php
$miid = sfContext::getInstance()->getUser()->getGuardUser()->getId();
$Usuario = UsuarioQuery::create()->filterBySfGuardUser($miid)->findOne();
$sf_guard_user = $Usuario->getSfGuardUserGroup();
$Feria = FeriaQuery::create()->filterById($sf_params->get('id'))->findOne();
?>
<form id="formulario" action="<?php echo url_for('feria/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
<div class="table-responsive">
  <table class="table">
    <tfoot>
      <tr>
        <td colspan="2">          
            <center><input type="submit" value="Guardar" /></center>
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</div>    
</form>
<?php echo link_to(image_tag('back.png'), 'feria/index', array('title' => 'Volver al Listado')) ?>
&nbsp;
<?php 
 if (!$form->getObject()->isNew() ) {

    if ($sf_guard_user == 1 || ($sf_guard_user == 2 && ($Feria->getIdUsuario() == $Usuario->getId()))) {
?>
<?php echo link_to(image_tag('delete.png'), 'feria/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Desea eliminar esta Feria y todos los elementos asociados a la misma?'))?>
<?php } 
  }
?>
<script>
    jQuery(document).ready(function() {    
    
            var id =$('#feria_id_estado option:selected').val();
            $.ajax({
            type: "POST",
            url: "<?php   echo url_for('feria/ajaxcargarmunicipios')?>",
            data:   "id_estado=" + id,
            success: function(html){
                var JSONobject = JSON.parse(html);
                $( "#feria_id_municipio" ).empty();
                $( "#feria_id_municipio" ).html(JSONobject.municipio);
                $( "#municipio" ).html(JSONobject.municipio);  
        
                $( "#feria_id_parroquia" ).parent("td").attr('id', 'parroquia');
                $( "#feria_id_parroquia" ).parent("td").empty();
                $( "#parroquia" ).html(JSONobject.parroquia);                 
            }
            });//fin de ajax    
    
        $('#feria_id_estado').live("change",function(){
            var id =$('#feria_id_estado option:selected').val();
            $.ajax({
            type: "POST",
            url: "<?php   echo url_for('feria/ajaxcargarmunicipios')?>",
            data:   "id_estado=" + id,
            success: function(html){
                var JSONobject = JSON.parse(html);
                $( "#feria_id_municipio" ).empty();
                $( "#feria_id_municipio" ).html(JSONobject.municipio);
                             
                $( "#feria_id_parroquia" ).parent("td").attr('id', 'parroquia');
                $( "#feria_id_parroquia" ).parent("td").empty();
                $( "#parroquia" ).html(JSONobject.parroquia);               
            }
            });//fin de ajax
            }); //fin de estado change  
       
        $('#feria_id_municipio').live("change",function(){
            var id =$('#feria_id_municipio option:selected').val();
            $.ajax({
            type: "POST",
            url: "<?php   echo url_for('feria/ajaxcargarparroquias')?>",
            data:   "id_municipio=" + id,
            success: function(html){
                $( "#feria_id_parroquia" ).parent("td").attr('id', 'parroquia');
                $( "#feria_id_parroquia" ).parent("td").empty();
                $( "#parroquia" ).html(html);
            }
            });//fin de ajax
        }); //fin de estado change              
            
});       
</script>    
