<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('humanmsg') ?>
<?php use_stylesheet('humanmsg') ?>
<?php use_javascript('modules/expositor_feria') ?>
<script>
    jQuery(document).ready(function() {
        <?php $ExpositorSelloeditorials = ExpositorLineaeditorialQuery::create()->
                filterByIdFeria($sf_params->get('id_feria'))->
                filterByIdExpositor($sf_params->get('id_expositor'))->
                find();
                if (count($ExpositorSelloeditorials) > 0) {    
                    foreach ($ExpositorSelloeditorials as $ExpositorSelloeditorial) {
        ?>
                    check_valor = <?php echo $ExpositorSelloeditorial->getLineaEditorial() ?>;
                       $('#expositor_feria_opciones_'+check_valor).attr('checked', true);

        <?php        
                    }
                }
        ?>
    });    
</script>
<script>
    jQuery(document).ready(function() {

		valor = $("select#expositor_feria_id_stand option:selected").val();
                id_feria = <?php echo $sf_params->get('id_feria') ?>;
		var dataString = 'valor=' + valor + '&id_feria=' + id_feria;;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url_for('stand/listado') ?>",
                        data: dataString,
                        success: function(data) {
                            $("#expositor_feria_id_stand").parent('td').append('<span id="costo"><b>   Costo del Stand: '+data+'</b></span>');
                        }
                    });
 
	$('select#expositor_feria_id_stand').on('change', '', function (e) {
		valor = $("select#expositor_feria_id_stand option:selected").val();
                id_feria = <?php echo $sf_params->get('id_feria') ?>;
		var dataString = 'valor=' + valor + '&id_feria=' + id_feria;;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url_for('stand/listado') ?>",
                        data: dataString,
                        success: function(data) {
                            $("#costo").empty();
                            $("#costo").append('   <b>Costo del Stand: '+data+'</b>');
                        }
                    });
	});
               
    });  

</script> 
<form id="formulario" action="<?php echo url_for('expositor_feria/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
<hr />
<?php $id_feria = $sf_params->get('id_feria'); ?>
<?php echo link_to(image_tag('back.png'),"expositor/indexexp?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<br>
<br>