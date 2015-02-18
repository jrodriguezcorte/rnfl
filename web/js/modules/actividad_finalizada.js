    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
           	$("select#actividad_finalizada_fecha_ejecucion_day").removeAttr('disabled');
		$("select#actividad_finalizada_fecha_ejecucion_day option:selected").removeAttr('disabled');
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
        })

	$("#actividad_finalizada_otro_incumplimiento").parents("tr").hide();

	$('#actividad_finalizada_opciones_5').on('change', function (e) {
		if ($(this).attr("checked")) {
			$("#actividad_finalizada_otro_incumplimiento").parents("tr").show();
	    	} else {
			$("#actividad_finalizada_otro_incumplimiento").parents("tr").hide();
		}				
	});

	$('#actividad_finalizada_incluir_info_geografica').on('change', function (e) {
		if ($(this).attr("checked")) {
			$( "#actividad_finalizada_id_pais" ).parents("tr").show();
			$( "#actividad_finalizada_id_estado" ).parents("tr").show();
			$( "#actividad_finalizada_id_municipio" ).parents("tr").show();
			$( "#actividad_finalizada_id_parroquia" ).parents("tr").show();
			$("#actividad_finalizada_id_region").parents("tr").show();
			$( "#actividad_finalizada_id_estado" ).prop( "disabled", false );
			$( "#actividad_finalizada_id_municipio" ).prop( "disabled", true );
			$( "#actividad_finalizada_id_parroquia" ).prop( "disabled", true );
	    	} else {
			$("#actividad_finalizada_id_pais").parents("tr").hide();
			$( "#actividad_finalizada_id_estado" ).prop( "disabled", true );
			$("#actividad_finalizada_id_estado").parents("tr").hide();
			$("#actividad_finalizada_id_municipio").parents("tr").hide();
			$( "#actividad_finalizada_id_parroquia" ).prop( "disabled", true );
			$("#actividad_finalizada_id_parroquia").parents("tr").hide();
			$( "#actividad_finalizada_id_region" ).prop( "disabled", true );
			$("#actividad_finalizada_id_region").parents("tr").hide();
		}				
	});


	$('#actividad_finalizada_id_pais').on('change', function (e) {
	    var optionSelected = $("option:selected", this);
	    var id_pais = this.value;
            if (id_pais == "1") {
		$( "#actividad_finalizada_id_estado" ).parents("tr").show();
		$( "#actividad_finalizada_id_municipio" ).parents("tr").show();
		$( "#actividad_finalizada_id_parroquia" ).parents("tr").show();
		$("#actividad_finalizada_id_region").parents("tr").show();
		$( "#actividad_finalizada_id_estado" ).prop( "disabled", false );
		$( "#actividad_finalizada_id_municipio" ).prop( "disabled", true );
		$( "#actividad_finalizada_id_parroquia" ).prop( "disabled", true );
	    }  else {
		$( "#actividad_finalizada_id_estado" ).prop( "disabled", true );
		$("#actividad_finalizada_id_estado").parents("tr").hide();
		$( "#actividad_finalizada_id_municipio" ).prop( "disabled", true );
		$("#actividad_finalizada_id_municipio").parents("tr").hide();
		$( "#actividad_finalizada_id_parroquia" ).prop( "disabled", true );
		$("#actividad_finalizada_id_parroquia").parents("tr").hide();
		$( "#actividad_finalizada_id_region" ).prop( "disabled", true );
		$("#actividad_finalizada_id_region").parents("tr").hide();
	    }	
	});        
    });
