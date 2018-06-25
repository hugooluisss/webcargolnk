$(document).ready(function(){
	getLista();
	
	$("#txtFecha").datepicker();
	
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
			txtTitulo: "required",
			txtFecha: "required",
			txtLugar: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TEvento;
			obj.add({
				id: $("#id").val(),
				titulo: $("#txtTitulo").val(),
				fecha: $("#txtFecha").val(),
				lugar: $("#txtLugar").val(),
				departamento: $("#selDepartamento").val(),
				publicado: $("#selPublicado").val(),
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
		$.get("listaeventos", function( data ) {
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
							$("#txtFecha").val(resp.fecha);
							$("#txtLugar").val(resp.lugar);
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
});