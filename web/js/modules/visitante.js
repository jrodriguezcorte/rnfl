    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
           	$("select#visitante_fecha_day").removeAttr('disabled');
		$("select#visitante_fecha_day option:selected").removeAttr('disabled');
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
        })

    });
