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
			txtEmail: "required",
			txtPass: "required",
			txtTelefono: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
		
			var obj = new TUsuario;
			obj.add({
				id: $("#id").val(), 
				nombre: $("#txtNombre").val(), 
				email: $("#txtEmail").val(),
				pass: $("#txtPass").val(),
				perfil: $("#selPerfil").val(),
				telefono: $("#txtTelefono").val(),
				direccion: $("#txtDireccion").val(),
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
		$.get("listaUsuarios", function( data ) {
			$("#dvLista").html(data);
			
			$("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var obj = new TUsuario;
					obj.del($(this).attr("usuario"), {
						after: function(data){
							getLista();
						}
					});
				}
			});
			
			$("[action=modificar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				
				$("#id").val(el.idUsuario);
				$("#txtNombre").val(el.nombre);
				$("#txtDireccion").val(el.direccion);
				$("#txtEmail").val(el.email);
				$("#txtPass").val(el.pass);
				$("#selPerfil").val(el.idPerfil);
				$("#txtTelefono").val(el.telefono);
				$('#panelTabs a[href="#add"]').tab('show');
			});
			
			$("[action=suscripciones]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				$("#winSuscripciones").attr("usuario", el.idUsuario);
			});
			
			
			$("#tblUsuarios").DataTable({
				"responsive": true,
				"language": espaniol,
				"paging": true,
				"lengthChange": false,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
		});
	}
	
	function getListaSuscripciones(){
		$.post("listaSuscripciones", {
			"usuario": $("#winSuscripciones").attr("usuario")
		}, function(data){
			$("#winSuscripciones").find("#dvListaSuscripciones").html(data);
			
			$("#dvListaSuscripciones").find("[action=eliminar]").click(function(){
				if(confirm("¿Seguro?")){
					var el = $(this);
					var obj = new TSuscripcion;
					obj.del({
						id: el.attr("identificador"), 
						fn: {
							after: function(data){
								getListaSuscripciones();
							}
						}
					});
				}
			});
		});
	}
	$("#winSuscripciones").on('show.bs.modal', function(e){
		getListaSuscripciones();
	});
	
	$("#winAddSuscripciones").on('show.bs.modal', function(e){
		$("#winSuscripciones").modal("hide");
	});
	
	$("#winAddSuscripciones").on('hidden.bs.modal', function(e){
		$("#winSuscripciones").modal();
	});
	
	$("#frmAddSuscripcion").validate({
		debug: true,
		rules: {
			selMembresia: "required",
			txtMetodoPago: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
		
			var obj = new TSuscripcion;
			obj.add({
				cliente: $("#winSuscripciones").attr("usuario"), 
				membresia: $("#selMembresia").val(),
				referencia: $("#txtReferencia").val(), 
				metodopago: $("#txtMetodoPago").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							$("#winAddSuscripciones").modal("hide");
						}else{
							alert("No se pudo agregar la suscripcion");
						}
					}
				}
			});
        }

    });
});