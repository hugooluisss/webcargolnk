$(document).ready(function(){
	getLista();
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtRazonSocial: "required",
			txtCorreo: {
				"required": true,
				"remote": {
					url: "ctransportistas",
					type: "post",
					data: {
						"action": "validarEmail",
						"id": function(){
							return $("#id").val();
						}
					}
				}
			},
			txtPass: "required"
		},
		wrapper: 'span',
		submitHandler: function(form){
			var obj = new TTransportistas;
			obj.add({
				id: $("#id").val(), 
				tipoCamion: $("#selTipoCamion").val(), 
				razonSocial: $("#txtRazonSocial").val(), 
				rut: $("#txtRUT").val(), 
				representante: $("#txtRepresentante").val(), 
				patente: $("#txtPatente").val(), 
				correo: $("#txtCorreo").val(), 
				pass: $("#txtPass").val(), 
				calificacion: $("#selCalificacion").val(), 
				aprobado: $("#selAprobado").val(), 
				situacion: $("#selSituacion").val(), 
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("No se guardó el registro, ocurrió un error");
						}
					}
				}
			});
        }

    });
		
	function getLista(){
		$.get("listatipocamion", function(data) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TTipoCamion;
					obj.del({
						"id": $(this).attr("identificador"), 
						fn: {
							after: function(data){
								getLista();
							}
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idTipoCamion);
				$("#txtDescripcion").val(el.descripcion);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"ordering": true,
				"info": true,
			});
		});
	}
});