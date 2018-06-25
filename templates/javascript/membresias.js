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
			txtTitulo: "required",
			txtPrecio: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TMembresia;
			obj.add({
				id: $("#id").val(),
				titulo: $("#txtTitulo").val(),
				descripcion: $("#txtDescripcion").val(),
				precio: $("#txtPrecio").val(),
				noprecio:$("#selPrecio").val(),
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
		$.get("listaMembresias", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TMembresia;
					obj.del($(this).attr("item"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idMembresia);
				$("#txtTitulo").val(el.titulo);
				$("#txtDescripcion").val(el.descripcion);
				$("#txtPrecio").val(el.precio);
				$("#selPrecio").val(el.noprecio);
				
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