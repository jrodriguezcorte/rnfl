    jQuery(document).ready(function() {
        jQuery("#formulario").submit(function(e) {
                humanMsg.displayMsg('La operación realizada ha finalizado exitosamente');
		$("select#expositor_feria_id_pais").removeAttr('disabled');
        })

	valor = $("select#expositor_feria_procedencia option:selected").val();
	if (valor == 0) {
		$("select#expositor_feria_id_pais").prop('disabled', 'disabled');
		pais = $("select#expositor_feria_id_pais").val();
		$("select#expositor_feria_id_pais option[value='1']").removeAttr('disabled');
		$("select#expositor_feria_id_pais option[value='1']").prop('selected', true);		
	}


	$('#expositor_feria_procedencia').on('change', '', function (e) {
		valor = $("select#expositor_feria_procedencia option:selected").val();
		if (valor == 0) {
		    $("select#expositor_feria_id_pais").prop('disabled', 'disabled');
		    $("select#expositor_feria_id_pais option[value='1']").removeAttr('disabled');
		    $("select#expositor_feria_id_pais option[value='1']").prop('selected', true);	
		} else {
		        $("select#expositor_feria_id_pais").removeAttr('disabled');
			pais = $("select#expositor_feria_id_pais").val();		
			if (pais == '1') {
				$("select#expositor_feria_id_pais option:selected").attr("disabled", "disabled");
			} 
			$("select#expositor_feria_id_pais option[value='2']").prop('selected', true);
		}
	});
    });
