<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('humanmsg') ?>
<?php use_stylesheet('humanmsg') ?>
<?php use_javascript('modules/actividad_finalizada') ?>
<script>
    jQuery(document).ready(function() {
        <?php $IncumplmientoActividadFinalizadas = IncumplmientoActividadFinalizadaQuery::create()->
                filterByIdFeria($sf_params->get('id_feria'))->
                filterByIdActividadFinalizada($sf_params->get('id'))->
                find();
                if (count($IncumplmientoActividadFinalizadas) > 0) {    
                    foreach ($IncumplmientoActividadFinalizadas as $IncumplmientoActividadFinalizada) {
        ?>
                    check_valor = <?php echo $IncumplmientoActividadFinalizada->getIdIncumplimientoActividad() ?>;
                       $('#actividad_finalizada_opciones_'+check_valor).attr('checked', true);

        <?php        
                    }
                }
        ?>
    });    
</script>
<form id="formulario" action="<?php echo url_for('actividad_finalizada/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'), "actividad_finalizada/index?id_feria=$id_feria", array('title' => 'Volver al Listado')) ?>
&nbsp;
<?php if (!$form->getObject()->isNew()): ?>
<?php echo link_to(image_tag('delete.png'), 'actividad_finalizada/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Desea eliminar este elemento?'))?>
<?php endif; ?>
<script>
    jQuery(document).ready(function() {    
    
            var id =$('#actividad_finalizada_id_estado option:selected').val();
            $.ajax({
            type: "POST",
            url: "<?php   echo url_for('actividad_finalizada/ajaxcargarmunicipios')?>",
            data:   "id_estado=" + id,
            success: function(html){
                var JSONobject = JSON.parse(html);
                $( "#actividad_finalizada_id_municipio" ).parent("td").attr('id', 'municipio');
                $( "#actividad_finalizada_id_municipio" ).parent("td").empty();
                $( "#municipio" ).html(JSONobject.municipio);  
                
                $( "#actividad_finalizada_id_parroquia" ).parent("td").attr('id', 'parroquia');
                $( "#actividad_finalizada_id_parroquia" ).parent("td").empty();
                $( "#parroquia" ).html(JSONobject.parroquia);                
            }
            });//fin de ajax    
    
        $('#actividad_finalizada_id_estado').live("change",function(){
            var id =$('#actividad_finalizada_id_estado option:selected').val();
            $.ajax({
            type: "POST",
            url: "<?php   echo url_for('actividad_finalizada/ajaxcargarmunicipios')?>",
            data:   "id_estado=" + id,
            success: function(html){
                var JSONobject = JSON.parse(html);
                $( "#actividad_finalizada_id_municipio" ).parent("td").attr('id', 'municipio');
                $( "#actividad_finalizada_id_municipio" ).parent("td").empty();
                $( "#municipio" ).html(JSONobject.municipio);  
                
                $( "#actividad_finalizada_id_parroquia" ).parent("td").attr('id', 'parroquia');
                $( "#actividad_finalizada_id_parroquia" ).parent("td").empty();
                $( "#parroquia" ).html(JSONobject.parroquia);                
            }
            });//fin de ajax
            }); //fin de estado change  
       
        $('#actividad_finalizada_id_municipio').live("change",function(){
            var id =$('#actividad_finalizada_id_municipio option:selected').val();
            $.ajax({
            type: "POST",
            url: "<?php   echo url_for('actividad_finalizada/ajaxcargarparroquias')?>",
            data:   "id_municipio=" + id,
            success: function(html){
                $( "#actividad_finalizada_id_parroquia" ).parent("td").attr('id', 'parroquia');
                $( "#actividad_finalizada_id_parroquia" ).parent("td").empty();
                $( "#parroquia" ).html(html);
            }
            });//fin de ajax
        }); //fin de estado change              
            
});       
</script>    
