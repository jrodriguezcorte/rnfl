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
<script>
    jQuery(document).ready(function() {

        $('select#pago_expositor_id_banco').on('change', '', function (e) {
		valor = $("select#pago_expositor_id_banco option:selected").val();
                id_feria = <?php echo $sf_params->get('id_feria') ?>;
		var dataString = 'valor=' + valor + '&id_feria=' + id_feria;;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url_for('pago_expositor/listadocuenta') ?>",
                        data: dataString,
                        success: function(data) {
                            var JSONobject = JSON.parse(data);
                            cuenta = '<b>N° de Cuenta</b> '+JSONobject['cuenta']+'<br>';
                            beneficiario = '<b>Beneficiario</b> '+JSONobject['beneficiario']+'<br>';
                            swift = JSONobject['swift'];
                            aba = JSONobject['aba'];
                            if (swift != '') {
                                swift = '<b>Swift</b> '+swift+'<br>';
                            } 
                             if (aba != '') {
                                aba = '<b>Aba</b> '+aba+'<br>';
                            }
                            resultado = cuenta+beneficiario+swift+aba;
                            
                            $("#infocuenta").empty();
                            $("#infocuenta").append(resultado);                        
                        }
                    });
	});
        
	$('select#pago_expositor_es_pago_banco_nacional').on('change', '', function (e) {
		valor = $("select#pago_expositor_es_pago_banco_nacional option:selected").val();
                id_feria = <?php echo $sf_params->get('id_feria') ?>;
		var dataString = 'valor=' + valor + '&id_feria=' + id_feria;;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url_for('pago_expositor/listadobanco') ?>",
                        data: dataString,
                        success: function(data) {
                            var JSONobject = JSON.parse(data);
                            selector = "<select name='pago_expositor[id_banco]' id='pago_expositor_id_banco'>";
                            $.each(JSONobject, function(index, value) {
                                selector += "<option value='"+index+"'>"+ value+"</option>";
                            });  
                            selector += '</select>';
                            $("#pago_expositor_id_banco").parents("td").html(selector);
                            
                            valor = $("select#pago_expositor_id_banco option:selected").val();
                            id_feria = <?php echo $sf_params->get('id_feria') ?>;
                            var dataString = 'valor=' + valor + '&id_feria=' + id_feria;;
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo url_for('pago_expositor/listadocuenta') ?>",
                                    data: dataString,
                                    success: function(data) {
                                        var JSONobject = JSON.parse(data);
                                        cuenta = '<b>N° de Cuenta</b> '+JSONobject['cuenta']+'<br>';
                                        beneficiario = '<b>Beneficiario</b> '+JSONobject['beneficiario']+'<br>';
                                        swift = JSONobject['swift'];
                                        aba = JSONobject['aba'];
                                        if (swift != '') {
                                            swift = '<b>Swift</b> '+swift+'<br>';
                                        } 
                                         if (aba != '') {
                                            aba = '<b>Aba</b> '+aba+'<br>';
                                        }
                                        resultado = cuenta+beneficiario+swift+aba;

                                        $("#infocuenta").empty();
                                        $("#infocuenta").append(resultado);                        
                                    }
                                });                        
                        }
                    });

                                                          
	});
        
        
 	    $('#pago_expositor_numero_deposito').blur(function(){
		$('#pago_expositor_numero_deposito:last').filter(function(){
		    var telef = $('#pago_expositor_numero_deposito').val();
		    var telefonoReg = /([0-9])$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
		        $('#pago_expositor_numero_deposito:last').val('');
		    }
		});
	    });        

    });  

</script>   
<script>
    jQuery(document).ready(function() {
        
        valor = $("select#pago_expositor_id_banco option:selected").val();
        id_feria = <?php echo $sf_params->get('id_feria') ?>;
        var dataString = 'valor=' + valor + '&id_feria=' + id_feria;
            $.ajax({
                type: "POST",
                url: "<?php echo url_for('pago_expositor/listadocuenta') ?>",
                data: dataString,
                success: function(data) {
                    var JSONobject = JSON.parse(data);
                    cuenta = '<b>N° de Cuenta</b> '+JSONobject['cuenta']+'<br>';
                    beneficiario = '<b>Beneficiario</b> '+JSONobject['beneficiario']+'<br>';
                    swift = JSONobject['swift'];
                    aba = JSONobject['aba'];
                    if (swift != '') {
                        swift = '<b>Swift</b> '+swift+'<br>';
                    } 
                     if (aba != '') {
                        aba = '<b>Aba</b> '+aba+'<br>';
                    }
                    resultado = '<p id="infocuenta" style="font-size:14px;">'+cuenta+beneficiario+swift+aba+'</p>';

                    $("#pago_expositor_id_banco").parent('td').after(resultado);
                }
            });    
                        
	$('select#pago_expositor_id_banco').on('change', '', function (e) {
		valor = $("select#pago_expositor_id_banco option:selected").val();
                id_feria = <?php echo $sf_params->get('id_feria') ?>;
		var dataString = 'valor=' + valor + '&id_feria=' + id_feria;;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url_for('pago_expositor/listadocuenta') ?>",
                        data: dataString,
                        success: function(data) {
                            var JSONobject = JSON.parse(data);
                            cuenta = '<b>N° de Cuenta</b> '+JSONobject['cuenta']+'<br>';
                            beneficiario = '<b>Beneficiario</b> '+JSONobject['beneficiario']+'<br>';
                            swift = JSONobject['swift'];
                            aba = JSONobject['aba'];
                            if (swift != '') {
                                swift = '<b>Swift</b> '+swift+'<br>';
                            } 
                             if (aba != '') {
                                aba = '<b>Aba</b> '+aba+'<br>';
                            }
                            resultado = cuenta+beneficiario+swift+aba;
                            
                            $("#infocuenta").empty();
                            $("#infocuenta").append(resultado);                        
                        }
                    });
	});
               
    });  

</script>