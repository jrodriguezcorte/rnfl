<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('humanmsg') ?>
<?php use_stylesheet('humanmsg') ?>
<?php use_javascript('modules/pago_expositor') ?>

<form id="formulario" action="<?php echo url_for('pago_expositor/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
<?php echo link_to(image_tag('back.png'),"expositor_feria/pago?id_feria=".$id_feria,array('title' => 'Ver listado'))?>
&nbsp;
<br>
<br>