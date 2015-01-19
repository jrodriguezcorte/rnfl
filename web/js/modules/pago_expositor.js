    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
           	humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');  
           	$("select#pago_expositor_fecha_pago_day").removeAttr('disabled');
		$("select#pago_expositor_fecha_pago_day option:selected").removeAttr('disabled'); 
        });
    });
