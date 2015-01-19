    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
		valor = $("#expositor_es_venezolano").is(':checked');
		if (valor && $("#expositor_rif").val() != '') {
		  humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
		} else {
		   if (!valor) {
			humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
		   } else {
				e.preventDefault();
		        	humanMsg.displayMsg('Verifique que haya insertado el número de Rif');
		                $(document).ready(function() {
		                setTimeout(function() {
		                    $('.humanMsg').fadeOut("slow", function() {
		                        //$('.humanMsg').remove();
		                    });

		                }, 3000);
                                });
		   }		
		}
        })


	$("#expositor_es_venezolano").on('click', '', function (e) {
		valor = $(this).is(':checked');
		if (valor) {
		    $("#expositor_rif").parents("tr").show();
		} else {
		    $("#expositor_rif").parents("tr").hide();	
		}
	});

	    $('#expositor_email').blur(function(){
		$('#expositor_email:last').filter(function(){
		    var emil = $('#expositor_email').val();
		    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		    if (!emailReg.test(emil)) {
		        alert('El formato de correo introducido es inválido. Inténtelo nuevamente');
		        $('#expositor_email:last').val('');
		    }
		});
	    });
	    
	     $('#expositor_telefono_local').blur(function(){
		$('#expositor_telefono_local:last').filter(function(){
		    var telef = $('#expositor_telefono_local').val();
		    var telefonoReg = /([0-9]{4})([-])([0-9]{7})$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
		        $('#expositor_telefono_local:last').val('');
		    }
		});
	    }); 

	     $('#expositor_telefono_celular').blur(function(){
		$('#expositor_telefono_celular:last').filter(function(){
		    var telef = $('#expositor_telefono_celular').val();
		    var telefonoReg = /([0-9]{4})([-])([0-9]{7})$/;
		    if (!telefonoReg.test(telef)) {
		        alert('El formato de teléfono introducido es inválido. Inténtelo nuevamente');
		        $('#expositor_telefono_celular:last').val('');
		    }
		});
	    });  
    });
