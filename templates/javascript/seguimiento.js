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
});