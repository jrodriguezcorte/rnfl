<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('humanmsg') ?>
<?php use_stylesheet('humanmsg') ?>
<?php use_javascript('modules/cuenta') ?>
<form id="formulario" action="<?php echo url_for('cuenta/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
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
</form>
<?php $id_feria = $sf_params->get('id_feria'); ?>

<?php echo link_to(image_tag('back.png'), "cuenta/index?id_feria=$id_feria", array('title' => 'Volver al Listado')) ?>
&nbsp;
<?php if (!$form->getObject()->isNew()): ?>
<?php echo link_to(image_tag('delete.png'), 'cuenta/delete?id='.$form->getObject()->getId().'&id_feria='.$id_feria, array('method' => 'delete', 'confirm' => '¿Desea eliminar este elemento?'))?>
<?php endif; ?>
