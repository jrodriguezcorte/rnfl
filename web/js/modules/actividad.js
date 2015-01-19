    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
           	$("select#actividad_fecha_sugerida_day").removeAttr('disabled');
		$("select#actividad_fecha_sugerida_day option:selected").removeAttr('disabled');
           	$("select#actividad_hora_day").removeAttr('disabled');
		$("select#actividad_hora_day option:selected").removeAttr('disabled');
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
        });

	$('#actividad_id_tipo_actividad').on('change', '', function (e) {
		valor = $("select#actividad_id_tipo_actividad option:selected").val();
		if (valor == "1") {
		    $("#actividad_editorial").parents("tr").show();
		    $("#actividad_presente_autor").parents("tr").show();
		} else {
		    $("#actividad_editorial").parents("tr").hide();
		    $("#actividad_presente_autor").parents("tr").hide();	
		}
	});

	    $('#actividad_email').blur(function(){
		$('#actividad_email:last').filter(function(){
		    var emil = $('#actividad_email').val();
		    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		    if (!emailReg.test(emil)) {
		        alert('El formato de correo introducido es inválido. Inténtelo nuevamente');
		        $('#actividad_email:last').val('');
		    }
		});
	    });
	    
	     $('#actividad_telefono_local').blur(function(){
		$('#actividad_telefono_local:last').filter(function(){
		    var telef = $('#actividad_telefono_local').val();
		    var telefonoReg = /([0-9]{4})([-])([0-9]{7})$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
		        $('#actividad_telefono_local:last').val('');
		    }
		});
	    }); 

	     $('#actividad_telefono_celular').blur(function(){
		$('#actividad_telefono_celular:last').filter(function(){
		    var telef = $('#actividad_telefono_celular').val();
		    var telefonoReg = /([0-9]{4})([-])([0-9]{7})$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
		        $('#actividad_telefono_celular:last').val('');
		    }
		});
	    });  

    });
