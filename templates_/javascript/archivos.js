$(document).ready(function(){
	getLista();
	
	$("#txtRegistro").datepicker();
	
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
			txtRegistro: "required",
			txtTitulo: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TArchivo;
			obj.add({
				id: $("#id").val(),
				titulo: $("#txtTitulo").val(),
				subtitulo: $("#txtSubtitulo").val(),
				registro: $("#txtRegistro").val(),
				departamento: $("#selDepartamento").val(),
				publicado: $("#selPublicado").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
							
							$("#frmUpload").prop("action", "?mod=citems&action=uploadArchivo&item=" + datos.id);
							$("#winUpload").modal();
						}else{
							alert("Upps... No se guardó");
						}
					}
				}
			});
        }

    });
		
	function getLista(){
		$.get("listaarchivos", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TItem;
					obj.del({id: $(this).attr("identificador"), fn: {
						after: function(data){
							getLista();
						}
					}});
				}
			});
			
			$("[action=upload]").click(function(){
				$("#frmUpload").prop("action", "?mod=citems&action=uploadArchivo&item=" + $(this).attr("identificador"));
				$("#winUpload").modal();
			});
			
			$("[action=modificar]").click(function(){
				var obj = new TItem();
				obj.getData({
					id: $(this).attr("identificador"),
					fn: {
						before: function(){
							$(this).prop("disabled", true);
						}, 
						after: function(resp){
							$(this).prop("disabled", false);
							
							$("#txtTitulo").val(resp.titulo);
							$("#selDepartamento").val(resp.idDepartamento);
							$("#selPublicado").val(resp.publicado);
							$("#txtSubtitulo").val(resp.subtitulo);
							$("#txtRegistro").val(resp.registro);
							$("#id").val(resp.idItem);
							
							$('#panelTabs a[href="#add"]').tab('show');
						}
					}
				});
				
				$('#panelTabs a[href="#add"]').tab('show');
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