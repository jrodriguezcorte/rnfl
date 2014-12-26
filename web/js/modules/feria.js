    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
           	$("select#feria_fecha_inicio_day").removeAttr('disabled');
		$("select#feria_fecha_inicio_day option:selected").removeAttr('disabled');
           	$("select#feria_fecha_fin_day").removeAttr('disabled');
		$("select#feria_fecha_fin_day option:selected").removeAttr('disabled');
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
        })

	$("#feria_nombre_escritor_homenajeado").parents("tr").hide();

	$('#feria_escritor_homenajeado').on('click', '', function (e) {
		if ($('#feria_escritor_homenajeado').is(':checked')) {
		    $("#feria_nombre_escritor_homenajeado").parents("tr").show();
		} else {
		    $("#feria_nombre_escritor_homenajeado").parents("tr").hide();	
		}
	});

	$('#feria_id_pais').on('change', function (e) {
	    var optionSelected = $("option:selected", this);
	    var id_pais = this.value;
            if (id_pais == "1") {
		$( "#feria_id_estado" ).parents("tr").show();
		$( "#feria_id_municipio" ).parents("tr").show();
		$( "#feria_id_parroquia" ).parents("tr").show();
		$("#feria_id_region").parents("tr").show();
		$( "#feria_id_estado" ).prop( "disabled", false );
		$( "#feria_id_municipio" ).prop( "disabled", true );
		$( "#feria_id_parroquia" ).prop( "disabled", true );
	    }  else {
		$( "#feria_id_estado" ).prop( "disabled", true );
		$("#feria_id_estado").parents("tr").hide();
		$( "#feria_id_municipio" ).prop( "disabled", true );
		$("#feria_id_municipio").parents("tr").hide();
		$( "#feria_id_parroquia" ).prop( "disabled", true );
		$("#feria_id_parroquia").parents("tr").hide();
		$( "#feria_id_region" ).prop( "disabled", true );
		$("#feria_id_region").parents("tr").hide();
	    }	
	});        
    });
