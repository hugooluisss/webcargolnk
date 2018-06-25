$(document).ready(function(){
	$("[showVista]").click(function(){
		var btn = $(this);
		
		$("[vista]").each(function(){
			$(this).hide();
		});
		$("[vista=" + btn.attr("showVista") + "]").fadeIn();
	});
	
	$("[showVista=productos]").prop("disabled", true);
	$("#selMarcas").find("option").prop("selected", true);
	$("#selTipos").find("option").prop("selected", true);
	
	$("#btnNuevoPedido").click(function(){
		var obj = new TPedido;
		obj.nuevo({
			fn: {
				before: function(){
					$("#btnNuevoPedido").prop("disabled", true);
				},
				after: function(resp){
					$("#btnNuevoPedido").prop("disabled", false);
					
					if (resp.band){
						$("#pedido").val(resp.pedido);
						listaProductosPedido();
						$("[showVista=productos]").prop("disabled", false);
						$("#btnFinalizarCaptura").show();
						
						$("[vista=productos]").find(".producto").each(function(){
							var dvProducto = $(this);
							var producto = Query.parseJSON($(this).attr("datos"));
							console.log("Precio", resp.precio);
							dvProducto.attr("noPrecio", resp.precio);
							switch(resp.precio){
								case '1':
									dvProducto.find(".price").text(producto.precio1);
								break;
								case '2':
									dvProducto.find(".price").text(producto.precio2);
								break;
								case '3':
									dvProducto.find(".price").text(producto.precio3);
								break;
								case '4':
									dvProducto.find(".price").text(producto.precio4);
								break;
							}
						});
					}
				}
			}
		});
	});
	
	$("[vista=productos]").find(".producto").click(function(){
		console.log($(this));
		$("#winDescripcionProducto").attr("datos", $(this).attr("datos"));
		$("#winDescripcionProducto").attr("noPrecio", $(this).attr("noPrecio"));
		console.log($(this).attr("datos"));
	});
	
	
	$('#winDescripcionProducto').on('shown.bs.modal', function(e){
		console.log("Producto", $("#winDescripcionProducto").attr("datos"));
		var producto = jQuery.parseJSON($("#winDescripcionProducto").attr("datos"));
		$.each(producto, function(key, valor){
			$('#winDescripcionProducto').find("[campo=" + key + "]").val(valor);
		});
		console.log("Precio producto seleccionado", $("#winDescripcionProducto").attr("noPrecio"));
		switch($("#winDescripcionProducto").attr("noPrecio")){
			case '1': $('#winDescripcionProducto').find("[campo=precio]").val(producto.precio1); break;
			case '2': $('#winDescripcionProducto').find("[campo=precio]").val(producto.precio2); break;
			case '3': $('#winDescripcionProducto').find("[campo=precio]").val(producto.precio3); break;
			case '4': $('#winDescripcionProducto').find("[campo=precio]").val(producto.precio4); break;
		}
		
		$("#txtCantidad").val(0);
		$("#txtCantidad").focus();
		$("#frmAddProducto").find("[type=submit]").prop("disabled", false);
	});
	
	$('#winDescripcionProducto').on('hidden.bs.modal', function(e){
		$("#winDescripcionProducto").attr("datos", "")
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
			var producto = jQuery.parseJSON($("#winDescripcionProducto").attr("datos"));
			var obj = new TPedido;
			obj.addMovimiento({
				"pedido": $("#pedido").val(),
				"producto": producto.idProducto,
				"cantidad": $("#txtCantidad").val(),
				fn: {
					before: function(){
						$("#frmAddProducto").find("[type=submit]").prop("disabled", true);
					},
					after: function(resp){
						$("#frmAddProducto").find("[type=submit]").prop("disabled", false);
						if (resp.band){
							$('#winDescripcionProducto').modal("hide");
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
	
	$("#btnFinalizarCaptura").click(function(){
		if (confirm("¿Seguro?")){
			var pedido = new TPedido;
			pedido.setEstado({
				pedido: $("#pedido").val(),
				estado: 2,
				fn: {
					before: function(){
						$("#btnFinalizarCaptura").prop("disabled", true);
					}, after: function(resp){
						$("#btnFinalizarCaptura").prop("disabled", false);
						if (resp.band){
							alert("Pedido finalizado, nos pondremos en contacto contigo para confirmarlo");
							location.reload(true);
						}else
							alert("Ocurrió un error en el servidor");
					}
				}
			});
		}
	});
    
    $(".indicadorFiltro").html("Todos los productos");
	$("#txtFiltro").keyup(function(e){
		var code = (e.keyCode ? e.keyCode : e.which);
		$(".indicadorFiltro").html("Presiona enter para filtrar...");
		
		if (code==13)
			listaProductos();
	});
	
	$('#winFiltros').on('hidden.bs.modal', function(e){
		listaProductos();
	});
		
	function listaProductos(){
		var texto = $("#txtFiltro").val().toString().toUpperCase();
		cont = 0;
		$(".indicadorFiltro").html('<i class="fa fa-circle-o-notch" aria-hidden="true"></i> Filtrando...');
		$(".producto").show();
		
		$(".producto").each(function(){
			el = $(this);
			
			if (!$("#selMarcas").find("option[value='" + el.attr('marca') + "']").is(":selected") || !$("#selTipos").find("option[value='" + el.attr('tipo') + "']").is(":selected")){
				el.hide();
			}else{
				var busqueda = el.attr("busqueda").toUpperCase();
				if (texto == '')
					el.show();
				else if (busqueda.search(texto.trim()) >= 0){
					el.show();
				}else
					el.hide();
			}
		});
		
		$(".indicadorFiltro").html("Productos encontrados");
		console.log(cont, " Productos encontrados");
	}
	
	function listaProductosPedido(){
		$.post("listaProductosPedido", {
			pedido: $("#pedido").val()
		}, function(codigoHTML){
			$("#dvDatosCompra").html(codigoHTML);
			
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
				});
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
			
			$("#formPaypal").find("[type=submit]").html("$ " + ($("#subtotal").attr("valor") * 1.04).toFixed(2) + ' USD <i class="fa fa-paypal" aria-hidden="true"></i>');
			$("#paypalTotal").text(($("#subtotal").attr("valor") * 1).toFixed(2));
			$("#formPaypal").find("[name=amount]").val(($("#subtotal").attr("valor") * 1.04));
		});
	}
	
	
	$('#winPedidos').on('shown.bs.modal', function(e){
		$.get("listaPedidosCotizador", function(codigoHTML){
			$("#winPedidos").find(".modal-body").html(codigoHTML);
			
			$("#tblPedidos").find("[action=cargarPedido]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				$("#pedido").val(el.idPedido);
				
				listaProductosPedido();
				$('#winPedidos').modal("hide");
				$("[showVista=productos]").prop("disabled", false);
				$("#btnFinalizarCaptura").show();
				$("#pnlComprobante").hide();
				
				$("[vista=productos]").find(".producto").each(function(){
					var dvProducto = $(this);
					var producto = el;
					console.log("Precio", producto.noPrecio);
					dvProducto.attr("noPrecio", producto.noPrecio);
					switch(producto.noPrecio){
						case '1':
							dvProducto.find(".price").text(producto.precio1);
						break;
						case '2':
							dvProducto.find(".price").text(producto.precio2);
						break;
						case '3':
							dvProducto.find(".price").text(producto.precio3);
						break;
						case '4':
							dvProducto.find(".price").text(producto.precio4);
						break;
					}
				});
			});
			
			$("#tblPedidos").find("[action=subirComprobante]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				$("#pedido").val(el.idPedido);
				
				listaProductosPedido();
				$('#winPedidos').modal("hide");
				$("#pnlComprobante").show();
				$("#btnFinalizarCaptura").hide();
				
				$("#upload").attr("action", "?mod=ccotizador&action=uploadComprobante&cotizacion=" + el.idPedido);
				$("#formPaypal").find("[name=item_name]").val("Pedido No " + el.idPedido);
				$("#formPaypal").find("[name=item_number]").val(el.idPedido);
				
				var cadena = el.idPedido;
				var retorna = $("#url").val() + '?mod=ccotizador&action=confirmar&codigo=' +  btoa(cadena);
				$("#formPaypal").find("[name=return]").val(retorna);
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
				alert("Solo se permite el uso de archivos JPG");
			else{
				alert("Hemos recibido tu comprobante de pago... por favor espera a que validemos la información");
				location.reload(true);
			}
        }
	});
});