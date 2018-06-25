$(document).ready(function(){
	getLista();
	
	$("#tblInventario").DataTable({
		"responsive": true,
		"language": espaniol,
		"paging": false,
		"lengthChange": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});
	
	$("#panelTabs li a[href=#add]").click(function(){
		$("#frmAdd").get(0).reset();
		$("#id").val("");
		$("form:not(.filter) :input:visible:enabled:first").focus();
	});
	
	$("#btnReset").click(function(){
		$('#panelTabs a[href="#listas"]').tab('show');
	});
	
	$("#tblInventario").find("[action=selectProducto]").click(function(){
		$("#winDetalleProducto").attr("datos", $(this).attr("datos"));
	});
	
	$('#winDetalleProducto').on('shown.bs.modal', function(e){
		var producto = jQuery.parseJSON($("#winDetalleProducto").attr("datos"));
		$.each(producto, function(key, valor){
			$('#winDetalleProducto').find("[campo=" + key + "]").val(valor);
		});
		
		$("#txtCantidad").val(0);
		$("#txtCantidad").focus();
		$("#frmAddProducto").find("[type=submit]").prop("disabled", false);
		
		$("#winCatalogoProductos").modal("hide");
	});
	
	$('#winDetalleProducto').on('hidden.bs.modal', function(e){
		$("#winCatalogoProductos").modal();
		$("#winDescripcionProducto").attr("datos", "");
	});
	
	$("#frmAddProducto").validate({
		debug: true,
		rules: {
			txtCantidad: {
				required: true,
				min: 1,
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var producto = jQuery.parseJSON($("#winDetalleProducto").attr("datos"));
			var obj = new TPedido;
			obj.addMovimiento({
				"pedido": $("#id").val(),
				"producto": producto.idProducto,
				"cantidad": $("#txtCantidad").val(),
				fn: {
					before: function(){
						$("#frmAddProducto").find("[type=submit]").prop("disabled", true);
					},
					after: function(resp){
						$("#frmAddProducto").find("[type=submit]").prop("disabled", false);
						if (resp.band){
							$('#winDetalleProducto').modal("hide");
							$("#pedido").val(resp.pedido);
							listaProductosPedido();
							$("[vista]").hide();
							$("[vista=carrito]").fadeIn();
							
						}
					}
				}
			});
		}
	});
	
	$("#frmEnvio").validate({
		debug: true,
		rules: {
			txtuia: {
				required: true,
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var pedido = jQuery.parseJSON($("#winEnvio").attr("datos"));
			var obj = new TPedido;
			obj.addEnvioPaqueteria({
				"pedido": pedido.idPedido,
				"paqueteria": $("#selPaqueteria").val(),
				"guia": $("#txtGuia").val(),
				fn: {
					before: function(){
						$("#frmEnvio").find("[type=submit]").prop("disabled", true);
					},
					after: function(resp){
						$("#frmEnvio").find("[type=submit]").prop("disabled", false);
						if (resp.band){
							$('#winEnvio').modal("hide");
							getLista();
						}
					}
				}
			});
		}
	});

	
	function getLista(){
		$.get("listaPedidos", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TPedido;
					obj.del($(this).attr("item"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idPedido);
				$("#txtCliente").val(el.cliente);
				$("#txtFolio").val(el.idPedido);
				$("#txtFecha").val(el.fecha);
				$("#txtCorreo").val(el.correo);
				console.log("Precio seleccionado", el.noPrecio);
				$("#tblInventario").find("tbody").find("tr").find(".precio").each(function(){
					var dv = $(this);
					var producto = jQuery.parseJSON(dv.parent().find("[action=selectProducto]").attr("datos"));
					
					switch(el.noPrecio){
						case '1': $(this).text(producto.precio1); break;
						case '2': $(this).text(producto.precio2); break;
						case '3': $(this).text(producto.precio3); break;
						case '4': $(this).text(producto.precio4); break;
					}
				});
				
				$('#panelTabs a[href="#add"]').tab('show');
				
				listaProductosPedido();
			});
			
			$("[action=facturar]").click(function(){
				$("#winFacturar").modal();
				var el = jQuery.parseJSON($(this).attr("datos"));
				var pedido = new TPedido();
				pedido.getData({
					id: el.idPedido,
					fn: {
						before: function(){
							$("#winFacturar").find(".alert").fadeIn();
						},after: function(resp){
							$("#winFacturar").find(".alert").fadeOut();
							if (resp.band){
								$.each(resp.datos, function(campo, valor){
									$("#winFacturar").find("[campo=" + campo + "]").val(valor);
									$("#winFacturar").find("[campo=" + campo + "]").text(valor);
								});
								
								$("#imgComprobante").attr("src", "repositorio/comprobante/comprobante" + resp.datos.idPedido + ".jpg");
								
								$("#upload").attr("action", "?mod=cpedidos&action=uploadFactura&pedido=" + resp.datos.idPedido);
							}
						}
					}
				});
			});
			
			$("[action=enviar]").click(function(){
				$("#winEnvio").modal();
				$("#winEnvio").attr("datos", $(this).attr("datos"));
				console.log($(this).attr("datos"));
				var el = jQuery.parseJSON($(this).attr("datos"));
				var pedido = new TPedido();
				
				$.each(el, function(campo, valor){
					$("#winEnvio").find("[campo=" + campo + "]").val(valor);
					$("#winEnvio").find("[campo=" + campo + "]").text(valor);
				});
			});
			
			$("#tblPedidos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"order": [[ 0, "desc" ]]
			});
		});
	};
	
	function listaProductosPedido(){
		$.post("listaProductosPedido", {
			pedido: $("#txtFolio").val()
		}, function(codigoHTML){
			$("#dvProductos").html(codigoHTML);
			
			$("#tblListaProductos").find(".changeCantidad").click(function(){
				var btn = $(this);
				var cantidad = prompt("Escribe la nueva cantidad", btn.attr("cantidad"));
				if (isNaN(cantidad))
					alert("No es un número");
				else if(cantidad < 1)
					alert("Debe de ser mayor a 0");
				else{
					var mov = new TMovimiento;
					mov.update({
						id: btn.attr("movimiento"),
						cantidad: cantidad,
						fn: {
							before: function(){
								btn.prop("disabled", true);
							},
							after: function(resp){
								btn.prop("disabled", true);
								if (resp.band)
									listaProductosPedido();
								else
									alert("No se pudo actualizar la cantidad");
							}
						}
					});
				}
			});
			
			$("#tblListaProductos").find("[action=eliminar]").click(function(){
				var el = $(this);
				var id = $(this).attr("idMovimiento");
				var mov = new TMovimiento;
				mov.del({
					id: id,
					fn: {
						before: function(){
							el.prop("disabled", true);
						}, after: function(resp){
							el.prop("disabled", false);
							if (resp.band){
								listaProductosPedido();
							}else
								alert("No se pudo eliminar");
						}
					}
				})
			});
			
			$("[envio]").change(function(){
				var campo = $(this);
				if (isNaN(campo.val())){
					alert("No es un número");
					campo.val(campo.attr("anterior"));
				}else if(campo.val() < 1){
					alert("Solo valores positivos");
					campo.val(campo.attr("anterior"));
				}else{
					var pedido = new TPedido();
					pedido.setEnvio({
						id: $("#txtFolio").val(),
						envio: campo.val(),
						fn: {
							before: function(){
								campo.prop("disabled", true);
							},
							after: function(resp){
								campo.prop("disabled", false);
								if (resp.band)
									listaProductosPedido();
								else{
									alert("No se pudo realizar la acción");
									campo.val(campo.attr("anterior"));
								}
							}
						}
					});
				}
			});
			
			$("#tblListaProductos").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": false,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
	
	$("[changeEstado]").click(function(){
		var btn = $(this);
		switch(btn.attr("changeEstado")){
			case '3':
				if ($("[envio]").val() == 0){
					alert("Indica el costo de envío");
					$("[envio]").select();
				}else{
					var pedido = new TPedido();
					pedido.setEstado({
						pedido: $("#txtFolio").val(),
						estado: 3,
						fn: {
							before: function(){
								btn.prop("disabled", true);
							}, after: function(resp){
								btn.prop("disabled", false);
								if (resp.band){
									$("#frmAdd").get(0).reset();
									$("#id").val("");
									$("#txtFolio").val("");
									$('#panelTabs a[href="#listas"]').tab('show');
									getLista();
								}else
									alert("No se pudo realizar el cambio de estado");
							}
						}
					});
				}
			break;
		}
	});
	
	$('#upload').fileupload({
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
			
			data.context = $('<p/>', {"class": "text-warning"}).html('<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i> Subiendo <b>' + data.files[0].name + '</b> al servidor... <i class="fa fa-upload" aria-hidden="true"></i>').appendTo($("#historial"));
			
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
		},
		complete: function(result, textStatus, jqXHR) {
			result = jQuery.parseJSON(result.responseText);
			if(result.status == 'error')
				alert("Solo se permite el uso de archivos ZIP");
			else{
				alert("La factura ha sido cargada");
				getLista();
				$("#winFacturar").modal("hide");
			}
        }
	});
});