    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
           	$("select#actividad_fecha_day").removeAttr('disabled');
		$("select#actividad_fecha_day option:selected").removeAttr('disabled');
           	$("select#actividad_hora_day").removeAttr('disabled');
		$("select#actividad_hora_day option:selected").removeAttr('disabled');
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
        });

	$("#actividad_observacion_tipo_actividad").parents("tr").hide();

	$('#actividad_id_tipo_actividad').on('change', '', function (e) {
		valor = $("select#actividad_id_tipo_actividad option:selected").val();
		if (valor == "5") {
		    $("#actividad_observacion_tipo_actividad").parents("tr").show();
		} else {
		    $("#actividad_observacion_tipo_actividad").parents("tr").hide();	
		}
	});

    });
