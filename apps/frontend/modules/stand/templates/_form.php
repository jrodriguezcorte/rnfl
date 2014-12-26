<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('humanmsg') ?>
<?php use_stylesheet('humanmsg') ?>
<?php use_javascript('modules/stand') ?>
<form id="formulario" action="<?php echo url_for('stand/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
<?php echo link_to(image_tag('back.png'), "stand/index?id_feria=$id_feria", array('title' => 'Volver al Listado')) ?>
&nbsp;
<?php if (!$form->getObject()->isNew()): ?>
<?php echo link_to(image_tag('delete.png'), 'stand/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => '¿Desea eliminar este elemento?'))?>
<?php endif; ?>