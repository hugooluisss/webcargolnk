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
			txtCodigo: "required",
			txtDescripcion: "required",
			txtPrecio1: {
				required: true,
				number: true,
				min: 0
			},
			txtPrecio2: {
				number: true,
				min: 0
			},
			txtPrecio3: {
				number: true,
				min: 0
			},
			txtPrecio4: {
				number: true,
				min: 0
			},
			txtPeso: {
				min: 0,
				required: true,
				number: true
			},
			txtMarca: "required",
			txtTipo: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TProducto;
			obj.add({
				id: $("#id").val(), 
				codigo: $("#txtCodigo").val(),
				descripcion: $("#txtDescripcion").val(),
				descripcionLarga: $("#txtDescripcionLarga").val(),
				precio1: $("#txtPrecio1").val(),
				precio2: $("#txtPrecio2").val(),
				precio3: $("#txtPrecio3").val(),
				precio4: $("#txtPrecio4").val(),
				peso: $("#txtPeso").val(),
				marca: $("#txtMarca").val(),
				tipo: $("#txtTipo").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							getLista();
							$("#frmAdd").get(0).reset();
							$('#panelTabs a[href="#listas"]').tab('show');
						}else{
							alert("Upps... " + datos.mensaje);
						}
					}
				}
			});
		}
    });
		
	function getLista(){
		$.get("listaProductos", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TProducto;
					obj.del($(this).attr("item"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idProducto);
				$("#txtCodigo").val(el.codigo);
				$("#txtDescripcion").val(el.descripcion);
				$("#txtDescripcionLarga").val(el.descripcionlarga);
				$("#txtPrecio1").val(el.precio1);
				$("#txtPrecio2").val(el.precio2);
				$("#txtPrecio3").val(el.precio3);
				$("#txtPrecio4").val(el.precio4);
				$("#txtPeso").val(el.peso);
				$("#txtMarca").val(el.marca);
				$("#txtTipo").val(el.tipo);
				
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