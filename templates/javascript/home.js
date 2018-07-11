$(document).ready(function(){
	var mapa;
	var posicion;
	var marca = new google.maps.Marker({});
	var target;
	
	jQuery.datetimepicker.setLocale('es');
	$("#txtFechaServicio").datetimepicker({
		format:'Y-m-d H:i',
		step: 30
	});
	
	$("#frmRegistraCarga").validate({
		debug: true,
		rules: {
			selCamion: "required",
			txtDescripcion: "required",
			txtFechaServicio: "required",
			txtOrigen: "required",
			txtDestino: "required",
			txtCorreo: {
				"required": true,
				"email": true
			},
			txtTelefono: "required",
			txtPeso: "required",
			txtTarifa: {
				required: true,
				number: true
			}
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TOrden;
			obj.add({
				id: $("#id").val(), 
				tipoCamion: $("#selCamion").val(),
				telefono: $("#txtTelefono").val(),
				correo: $("#txtCorreo").val(),
				descripcion: $("#txtDescripcion").val(),
				fechaServicio: $("#txtFechaServicio").val(),
				origen: $("#txtOrigen").attr("json"),
				destino: $("#txtDestino").attr("json"),
				presupuesto: $("#txtTarifa").val(),
				peso: $("#txtPeso").val(),
				fn: {
					after: function(datos){
						if (datos.band){
							$("#winRegistraCarga").modal("hide");
							$("#frmRegistraCarga")[0].reset();
							$("#txtOrigen").val("");
							$("#txtOrigen").attr("latitude", "");
							$("#txtOrigen").attr("longitude", "");
							$("#txtDestino").val("");
							$("#txtDestino").attr("latitude", "");
							$("#txtDestino").attr("longitude", "");
							
							alert("La orden fue guardada con el folio " + datos.folio);
						}else{
							alert("No se pudo guardar la orden");
						}
					}
				}
			});
        }

    });
	
	
	
	
	$("#winMapa").on('shown.bs.modal', function(e){
		$("#winRegistraCarga").modal("hide");
		
		target = $(e.relatedTarget);
		if ($(target.attr("data-text")).attr("longitude") == '' || $(target.attr("data-text")).attr("longitude") == undefined){
			navigator.geolocation.getCurrentPosition(function(position){
				posicion = {};
				posicion.latitude = position.coords.latitude;
				posicion.longitude = position.coords.longitude;
				
				ubicar();
			}, function(){
				alert("No se pudo obtener tu localización");
			});
		}else{
			posicion.latitude = $(target.attr("data-text")).attr("latitude");
			posicion.longitude = $(target.attr("data-text")).attr("longitude");
			$("#txtDireccion").val($(target.attr("data-text")).val());
			//ubicar();
		}
	});
	
	$("#winMapa").on('hidden.bs.modal', function(e){
		$("#winRegistraCarga").modal();
	});
	
	$("#btnDefinir").click(function(){
		$(target.attr("data-text")).val($("#txtDireccion").val());
		$(target.attr("data-text")).attr("latitude", posicion.latitude);
		$(target.attr("data-text")).attr("longitude", posicion.longitude);
		
		var json = new Object;
		json.latitude = posicion.latitude;
		json.longitude = posicion.longitude;
		json.direccion = $("#txtDireccion").val();
		
		$(target.attr("data-text")).attr("json", JSON.stringify(json));
		
		$("#winMapa").modal("hide");
	});
	
	
	$("#txtBuscarDireccion").keyup(function(e){
		if(e.keyCode == 13){
			var str = $("#txtBuscarDireccion").val() + " chile";
			$("#txtBuscarDireccion").prop("disabled", true);
			
			$.get("https://maps.googleapis.com/maps/api/geocode/json?language=es&address=" + str + "&key=AIzaSyACOp_nFCQAIBJwb58so1Ru_AJ8apWv0sY", function(resp){
				$("#txtBuscarDireccion").prop("disabled", false);
				if (resp.results.length == 0)
					alert("No hay resultados");
				else{
					var lugar = resp.results[0];
					posicion.latitude = lugar.geometry.location.lat;
					posicion.longitude = lugar.geometry.location.lng;
					
					var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
					mapa.setCenter(LatLng);
					marca.setPosition(LatLng);
					marca.setMap(mapa);
					//getDireccion(posicion.latitude, posicion.longitude);
					
					$("#txtDireccion").val(lugar.formatted_address);
				}
			});
		}
	});
	
	function ubicar(){
		if (mapa == null){
			marca = new google.maps.Marker({});
			mapa = new google.maps.Map(document.getElementById('dvMapa'), {
				center: {lat: posicion.latitude, lng: posicion.longitude},
				scrollwheel: true,
				fullscreenControl: true,
				zoom: 14,
				zoomControl: true
			});
			
			google.maps.event.addListener(mapa, 'click', function(event){
				var LatLng = event.latLng;
				
				marca.setPosition(LatLng);
				marca.setMap(mapa);
				posicion.latitude = event.latLng.lat();
				posicion.longitude = event.latLng.lng();
				
				getDireccion(posicion.latitude, posicion.longitude);
			});
			
			var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
			mapa.setCenter(LatLng);
			marca.setPosition(LatLng);
			marca.setMap(mapa);
			getDireccion(posicion.latitude, posicion.longitude);
		}else{
			var LatLng = new google.maps.LatLng(posicion.latitude, posicion.longitude);
			mapa.setCenter(LatLng);
			marca.setPosition(LatLng);
			marca.setMap(mapa);
			
			getDireccion(posicion.latitude, posicion.longitude);
		}
	}
	
	function getDireccion(latitude, longitude){
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({'latLng': new google.maps.LatLng(latitude, longitude)}, function (results, status){
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					$("#txtDireccion").val(results[0].formatted_address);
				} else {
					alert('Google no retorno resultado alguno.');
				}
			} else {
				alert("Geocoding fallo debido a : " + status);
			}
		});
	}
});