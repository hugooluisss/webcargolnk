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
			selEstado: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TSolicitud;
			obj.add({
				id: $("#id").val(),
				estado: $("#selEstado").val(),
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
		$.get("listasolicitudes", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TUnidad;
					obj.del({id: $(this).attr("identificador"), fn: {
						after: function(data){
							getLista();
						}
					}});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idSolicitud);
				$("#txtUsuario").val(el.usuario);
				$("#txtDepartamento").val(el.departamento);
				$("#txtUnidad").val(el.unidad);
				$("#txtFecha").val(el.fecha);
				$("#selEstado").val(el.estado);
				$("#txtCuerpo").val("");
				
				var cuerpo = jQuery.parseJSON(el.json);
				console.log(el);
				$.each(cuerpo, function(i, obj){
					$("#txtCuerpo").val($("#txtCuerpo").val() + obj.titulo + ": " + obj.valor + "\n");
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
				"autoWidth": false,
				"order": [[ 1, 'desc' ], [ 0, 'asc' ]]
			});
		});
	};
});