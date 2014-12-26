    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
           	valor = $("select#pago_expositor_forma_pago option:selected").val();
		if (valor == 0) {
			deposito_nacional = $("#pago_expositor_deposito_nacional").val();
			planilla_deposito_nacional = $("#pago_expositor_planilla_deposito_nacional").val();
			transferencia_cuenta = $("#pago_expositor_transferencia_cuenta").val();
                        monto = $("#pago_expositor_monto").val();
                        
			$("#pago_expositor_banco_emisor").val('');
			$("#pago_expositor_numero_transaccion").val('');
			if (deposito_nacional >= 0 && planilla_deposito_nacional != '' && transferencia_cuenta != '' && monto > 0) {
				humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
			} else {
				e.preventDefault();
		        	humanMsg.displayMsg('Verifique que haya insertado todos los datos solicitados');
		                $(document).ready(function() {
		                setTimeout(function() {
		                    $('.humanMsg').fadeOut("slow", function() {
		                        //$('.humanMsg').remove();
		                    });

		                }, 3000);
                                });
			}
		} else {
			$("#pago_expositor_planilla_deposito_nacional").val('');
			$("#pago_expositor_transferencia_cuenta").val('');
                        monto = $("#pago_expositor_monto").val();                        
			banco_emisor = $("#pago_expositor_banco_emisor").val();
			numero_transaccion = $("#pago_expositor_numero_transaccion").val();
                        
			if (banco_emisor != '' && numero_transaccion != '' && monto > 0) {
				humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
			} else {
				e.preventDefault();
		        	humanMsg.displayMsg('Verifique que haya insertado todos los datos solicitados');
		                $(document).ready(function() {
		                setTimeout(function() {
		                    $('.humanMsg').fadeOut("slow", function() {
		                        //$('.humanMsg').remove();
		                    });

		                }, 3000);
                                });
			}
		}
                
        });


	valor = $("select#pago_expositor_forma_pago option:selected").val();
	if (valor == 0) {
		$("#pago_expositor_deposito_nacional").parents("tr").show();	
		$("#pago_expositor_planilla_deposito_nacional").parents("tr").show();
		$("#pago_expositor_transferencia_cuenta").parents("tr").show();	
		$("#pago_expositor_banco_emisor").parents("tr").hide();
		$("#pago_expositor_numero_transaccion").parents("tr").hide();
	}
	

	$('select#pago_expositor_forma_pago').on('change', '', function (e) {
		valor = $("select#pago_expositor_forma_pago option:selected").val();
		if (valor == 0) {
			$("#pago_expositor_deposito_nacional").parents("tr").show();	
			$("#pago_expositor_planilla_deposito_nacional").parents("tr").show();
			$("#pago_expositor_transferencia_cuenta").parents("tr").show();	
			$("#pago_expositor_banco_emisor").parents("tr").hide();
			$("#pago_expositor_numero_transaccion").parents("tr").hide();
		} else {
			$("#pago_expositor_deposito_nacional").parents("tr").hide();	
			$("#pago_expositor_planilla_deposito_nacional").parents("tr").hide();
			$("#pago_expositor_transferencia_cuenta").parents("tr").hide();	
			$("#pago_expositor_banco_emisor").parents("tr").show();
			$("#pago_expositor_numero_transaccion").parents("tr").show();
		}
	});

    });
