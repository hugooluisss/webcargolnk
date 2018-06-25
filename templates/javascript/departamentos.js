$(document).ready(function(){
	getLista();
	$("#txtColor1").colorpicker();
	$("#txtColor2").colorpicker();
	
	$('#txtCuerpo').ckeditor();
	
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
			txtClave: "required",
			txtNombre: "required",
			txtColor1: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TDepartamento;
			obj.add({
				id: $("#id").val(),
				nombre: $("#txtNombre").val(),
				clave: $("#txtClave").val(),
				color1: $("#txtColor1").val(),
				color2: $("#txtColor2").val(),
				cuerpo: $("#txtCuerpo").val(),
				formulario: $("#txtFormulario").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... No se guardó");
						}
					}
				}
			});
        }

    });
		
	function getLista(){
		$.get("listadepartamentos", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TDepartamento;
					obj.del({id: $(this).attr("identificador"), fn: {
						after: function(data){
							getLista();
						}
					}});
				}
			});
			
			$("[action=modificar]").click(function(){
				var obj = new TDepartamento;
				obj.getData({
					id: $(this).attr("identificador"),
					fn: {
						after: function(el){
							$("#id").val(el.idDepartamento);
							$("#txtClave").val(el.clave);
							$("#txtNombre").val(el.nombre);
							$("#txtColor1").val(el.color1);
							$("#txtColor2").val(el.color2);
							$("#txtCuerpo").val(el.cuerpo);
							$("#txtFormulario").val(el.formulario);
						}
					}
				})
				
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=uploadPortada]").click(function(){
				$("#frmUpload").prop("action", "?mod=cdepartamentos&action=uploadPortada&id=" + $(this).attr("identificador"));
				$("#winUpload").modal();
			});
			
			$("[action=uploadIcono]").click(function(){
				$("#frmUpload").prop("action", "?mod=cdepartamentos&action=uploadIcono&id=" + $(this).attr("identificador"));
				$("#winUpload").modal();
			});
			
			$("#tblDatos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	};
	
	$('#frmUpload').fileupload({
		dataType: 'json',
		progressall: function (e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$(".progress .progress-bar").css('width', progress + '%');
			
			if (progress < 100)
				$(".alert-danger").show();
			else
				$(".alert-danger").hide();
		},
		add: function (e, data) {
			console.log(data);
			var archivos = '';
			
			data.context = $('<p/>', {"class": "text-warning"}).html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> Subiendo <b>' + data.files[0].name + '</b> al servidor... <i class="fa fa-upload" aria-hidden="true"></i>').appendTo($("#elementos"));
			
			data.submit();
        },
		fail: function(){
			alert("Ocurrió un problema en el servidor, contacta al administrador del sistema");
			
			console.log("Error en el servidor al subir el archivo, checa permisos de la carpeta repositorio");
		},
		done: function (e, data) {
            $.each(data.files, function (index, file) {
            	data.context.html('<i class="fa fa-2x fa-check-circle" aria-hidden="true"></i> ' + file.name + ' 100% arriba');
            	data.context.removeClass("text-warning");
            	data.context.addClass("text-success");
            });
            
            $("#winUpload").modal("hide");
        },
        complete: function(result, textStatus, jqXHR) {
        	//console.log(result);
        	result = jQuery.parseJSON(result.responseText);
        	if(result.status == 'error')
        		alert("Ocurrió un error al subir el archivo");
        }
	});
	
	$('#winUpload').on('hidden.bs.modal', function(){
		getLista();
	});

});