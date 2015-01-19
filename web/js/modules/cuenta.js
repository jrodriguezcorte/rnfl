    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
        })

	     $('#cuenta_numero').blur(function(){
		$('#cuenta_numero:last').filter(function(){
		    var telef = $('#cuenta_numero').val();
		    var telefonoReg = /([0-9])$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
		        $('#cuenta_numero:last').val('');
		    }
		});
	    });  

    });
