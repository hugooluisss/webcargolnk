$(document).ready(function(){
	$("a").click(function(){
		$($(this).attr("data-target")).attr("datos", $(this).attr("datos"));
	});
	
	$("#winPaypal").on('show.bs.modal', function(e){
		var el = jQuery.parseJSON($("#winPaypal").attr("datos"));
		$.each(el, function(key, valor){
			$('#winPaypal').find("[campo=" + key + "]").val(valor);
			$('#winPaypal').find("[campo=" + key + "]").text(valor);
		});
		
		var f = new Date();
		var fecha = f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();
		
		var cadena = el.idMembresia + '|.|' + $("#usuario").val() + '|.|' + fecha + '|.|paypal';
		var retorna = $("#url").val() + '?mod=csuscripciones&action=confirmar&codigo=' +  btoa(cadena);
		$('#winPaypal').find("[campo=retorno]").val(retorna);
		$('#winPaypal').find("[campo=precio]").val(el.precio * 1.06);
		$('#winPaypal').find("[campo=precioTotal]").text((el.precio * 1.06).toFixed(2));
		//{$ini.sistema.url}?mod=cmembresias&action=confirmar&codigo={base64_encode($row.idMembresia|cat:'|.|'|cat:$PAGE.usuario->getId()|cat:'|.|'|cat:date("Y-m-d H:i:s")|cat:'|.|paypal')}
	});
	
	$("#winEfectivo").on('show.bs.modal', function(e){
		var el = jQuery.parseJSON($("#winEfectivo").attr("datos"));
		$.each(el, function(key, valor){
			$('#winEfectivo').find("[campo=" + key + "]").val(valor);
			$('#winEfectivo').find("[campo=" + key + "]").text(valor);
		});
		
		$('#winEfectivo').find("[campo=precio]").text(el.precio);
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
            
            $("#winEfectivo").modal("hide");
            
            alert("Gracias por enviarnos tu comprobante de pago... en menos de 24 horas te avisaremos de la activación de tu suscripción");
            location.href="logout";
        },
        complete: function(result, textStatus, jqXHR) {
        	//console.log(result);
        	result = jQuery.parseJSON(result.responseText);
        	if(result.status == 'error')
        		alert("Solo se permite el uso de archivos JPG");
        }
	});
	
	$(".gratis").each(function(){
		$(this).click(function(){
			var el = jQuery.parseJSON($(this).attr("datos"));
			var btn = $(this);
			if (confirm("Estás adquiriendo una membresía gatuita ¿seguro?")){
				var suscripcion = new TSuscripcion;
				suscripcion.add({
					cliente: $("#usuario").val(),
					membresia: el.idMembresia,
					metodopago: "Sitio web - Gratis",
					referencia: "Sitio web - Gratis",
					fn: {
						before: function(){
							btn.prop("disabled", true);
						}, after: function(resp){
							btn.prop("disabled", false);
							
							if (resp.band)
								location.href = "cotizador";
							else
								alert("No se pudo agregar la suscripción a tu cuenta... intentalo más tarde")
						}
					}
				});
			}
		});
	});
});