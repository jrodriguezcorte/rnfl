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