$(document).ready(function(){
	var ventana = $("#winSeguimiento");
	var marca = undefined;
	var refreshIntervalId;
	
	$("#winSeguimiento").on('hidden.bs.modal', function(e){
		clearInterval(refreshIntervalId);
	});
	
	$("#winSeguimiento").on('shown.bs.modal', function(e){
		ventana.find(".modal-body").html("");
		ventana.find(".modal-body").append($('<div id="dvMapaSeguimiento" style="height: 400px"></div>'));
		//console.info($(e.relatedTarget));
		var orden = jQuery.parseJSON($(e.relatedTarget).attr("datos"));
		var mapPoint = undefined;
		ventana.find(".modal-title").html("Seguimiento de la Orden " + orden.folio);
		
		mapPoint = new google.maps.Map(document.getElementById('dvMapaSeguimiento'), {
			center: {lat: orden.origen_json.latitude, lng: orden.origen_json.longitude},
			scrollwheel: true,
			fullscreenControl: true,
			zoom: 7,
			zoomControl: true
		});
		
		var origen = new google.maps.LatLng(orden.origen_json.latitude, orden.origen_json.longitude);
		var destino = new google.maps.LatLng(orden.destino_json.latitude, orden.destino_json.longitude);
		
		marcaOrigen = new google.maps.Marker({
			title: "Origen",
			icon: "templates/img/origen.png"
		});
		marcaOrigen.setPosition(origen);
		marcaOrigen.setMap(mapPoint);
		
		marcaDestino = new google.maps.Marker({
			title: "Destino"
			
		});
		marcaDestino.setPosition(destino);
		marcaDestino.setMap(mapPoint);
		
		var objOrden = new TOrden();
		
		var marca = new google.maps.Marker({
			title: "Última posición",
			icon: "templates/img/truck.png"
		});
		marca.setMap(mapPoint);
		mapPoint.setZoom(14);
		
		ultimaPosicion();
		
		refreshIntervalId = setInterval(function(){
			ultimaPosicion();
		}, 3000);
		
		function ultimaPosicion(){
			objOrden.getLastPosicion({
				id: orden.idOrden,
				fn: {
					before: function(){
						console.info("Actualizando última posicion");	
					},
					after: function(posicion){
						marca.setPosition(new google.maps.LatLng(posicion.latitude, posicion.longitude));
						mapPoint.setCenter(marca.getPosition());
					}
				}
			});
		}
	});
});