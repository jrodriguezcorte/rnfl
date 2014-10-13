    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
           	$("select#actividad_fecha_day").removeAttr('disabled');
		$("select#actividad_fecha_day option:selected").removeAttr('disabled');
           	$("select#actividad_hora_day").removeAttr('disabled');
		$("select#actividad_hora_day option:selected").removeAttr('disabled');
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
        })

    });
