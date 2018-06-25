TProducto = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cproductos', {
				"id": datos.id,
				"codigo": datos.codigo,
				"descripcion": datos.descripcion,
				"descripcionLarga": datos.descripcionLarga,
				"precio1": datos.precio1,
				"precio2": datos.precio2,
				"precio3": datos.precio3,
				"precio4": datos.precio4,
				"peso": datos.peso,
				"marca": datos.marca,
				"tipo": datos.tipo,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cestados', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == false){
				console.log("Ocurrió un error al eliminar el estado");
			}
		}, "json");
	};
};