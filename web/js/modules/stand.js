    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
		metros = $("#stand_metros").val();
		tarifa = $("#stand_costo_bs").val();
		if (($.isNumeric(metros) && $.isNumeric(tarifa))) {
                        humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
		} else {
			e.preventDefault();
                	humanMsg.displayMsg('Los valores deben ser números');
                        $(document).ready(function() {
                        setTimeout(function() {
                            $('.humanMsg').fadeOut("slow", function() {
                                //$('.humanMsg').remove();
                            });

                        }, 3000);
                    });
		}
        })

    });
