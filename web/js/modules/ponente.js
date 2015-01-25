    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
        })
	    $('#ponente_rif').blur(function(){
		$('#ponente_rif:last').filter(function(){
		    var telef = $('#ponente_rif').val();
		    var telefonoReg =  /^[VE]\d{8,9}?$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato del RIF introducido es inválido. Inténtelo nuevamente');
		        $('#ponente_rif:last').val('');
		    }
		});
	    });
        
            $('#ponente_telefono_local').blur(function(){
		$('#ponente_telefono_local:last').filter(function(){
		    var telef = $('#ponente_telefono_local').val();
		    var telefonoReg = /([0-9]{4})([-])([0-9]{7})$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
		        $('#ponente_telefono_local:last').val('');
		    }
		});
	    }); 

	     $('#ponente_telefono_celular').blur(function(){
		$('#ponente_telefono_celular:last').filter(function(){
		    var telef = $('#ponente_telefono_celular').val();
		    var telefonoReg = /([0-9]{4})([-])([0-9]{7})$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
		        $('#ponente_telefono_celular:last').val('');
		    }
		});
	    }); 
    });
