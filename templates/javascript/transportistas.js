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
			var obj = new TTransportista;
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
				telefono: $("#txtTelefono").val(),
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
		$.get("listatransportistas", function(data) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TTransportista;
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
				
				$("#id").val(el.idTransportista);
				$("#txtRazonSocial").val(el.razonsocial);
				$("#txtRepresentante").val(el.representante);
				$("#txtPatente").val(el.patente);
				$("#txtRUT").val(el.rut);
				$("#txtCorreo").val(el.correo);
				$("#txtTelefono").val(el.telefono);
				$("#txtPass").val(el.pass);
				$("#selCalificacion").val(el.calificacion);
				$("#selAprobado").val(el.aprobado);
				$("#selSituacion").val(el.idSituacion);
				$("#selTipoCamion").val(el.idTipoCamion);
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
	
	$("#winDocumentos").on("show.bs.modal", function(e){
		$("#frmUpload").prop("action", "?mod=ctransportistas&action=upload&id=" + $(e.relatedTarget).attr("identificador"));
		$("#winDocumentos").attr("transportista", $(e.relatedTarget).attr("identificador"));
		getArchivos($(e.relatedTarget).attr("identificador"));
	});
	
	
	$("#winDocumentos").find(".modal-body").find(".alert").hide();
	$("#winDocumentos").find("#frmUpload").fileupload({
		dataType: 'json',
		add: function (e, data) {
			$("#winDocumentos").find(".modal-body").find(".alert").show();
			data.submit();
		},
		done: function (e, data) {
			$("#winDocumentos").find(".modal-body").find(".alert").hide();
			if (data.result.band){
				alert("El archivo subió con éxito");
				getArchivos($('#winDocumentos').attr("transportista"));
			}else
				alert("Ocurrió un error al guardar el archivo");
		}
    });
    
	function getArchivos(transportista){
		$.post("ctransportistas", {
			"action": "getDocumentos",
			"id": transportista
		}, function(archivos){
			$('#winDocumentos').find(".lista").find("li").remove();
			$.each(archivos, function(i, el){
				$('#winDocumentos').find(".lista").append('<li class="list-group-item" ruta="' + el.ruta + '"><i class="fas fa-2x fa-trash-alt text-danger"></i> <a href="' + el.ruta + '" download="' + el.nombre + '">' + el.nombre + '</a></li>');
			});
			
			$('#winDocumentos').find(".lista").find("i").click(function(){
				var el = $(this);
				if (confirm("¿Seguro de querer eliminar?")){
					$.post("ctransportistas", {
						"action": "delDocumento",
						"ruta": el.parent().attr("ruta")
					}, function(resp){
						if (resp.band)
							getArchivos($('#winDocumentos').attr("transportista"));
						else
							alert("No se pudo eliminar la imagen");
					}, "json");
				}
			});
		}, "json");
	}
});