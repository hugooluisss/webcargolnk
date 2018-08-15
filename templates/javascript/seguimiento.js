$(document).ready(function(){
	var orden = $("#orden").val();
	console.info("Orden", orden);
	getInteresados();
	function getInteresados(){
		$.post("listaPostulantes", {
			"orden": orden
		}, function(resp){
			$("#postulantes").html(resp);
			
			$("#postulantes").find("[action=asignar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				if(confirm("Asignar carga ¿está seguro?")){
					var obj = new TTransportista;
					obj.asignar({
						"orden": orden,
						"transportista": el.idTransportista,
						"monto": el.monto,
						fn: {
							after: function(resp){
								if (resp.band){
									alert("La orden fué asignada");
									getInteresados();
								}
							}
						}
					});
				}
			});
			
			$("#postulantes").find("[action=desasignar]").click(function(){
				var el = jQuery.parseJSON($(this).attr("datos"));
				if(confirm("Quitar carga ¿está seguro?")){
					var obj = new TOrden;
					obj.quitarAsignacion({
						"id": orden,
						fn: {
							after: function(resp){
								if (resp.band){
									alert("La orden fué desasignada");
									getInteresados();
								}
							}
						}
					});
				}
			});
		});
	}
	
	$.post("reporte", {
		orden: $("#orden").val()
	}, function(resp){
		console.info("reporte final")
		$("#reporte").html(resp);
	});
	
	
	var marca = undefined;
	var refreshIntervalId;
	$("#seguimiento").html("");
	$("#seguimiento").append($('<div id="dvMapaSeguimiento" style="height: 400px"></div>'));
	//console.info($(e.relatedTarget));
	var orden = jQuery.parseJSON($("#datosOrden").val());
	var mapPoint = undefined;
	
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