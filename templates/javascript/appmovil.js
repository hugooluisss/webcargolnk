$(document).ready(function(){
	$(".setSeccion").each(function(){
		var el = $(this);
		el.change(function(){
			el.prop("disabled", true);
			
			$.post("cappmovil", {
				"seccion": el.val(),
				"clave": el.attr("clave"),
				"modulo": "cappmovil",
				"action": "change"
			}, function(resp){
				el.prop("disabled", false);
				
				if (!resp.band){
					alert("No se pudo realizar el cambio");
				}
			}, "json");
		});
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