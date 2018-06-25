TMembresia = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		$.post('cmembresias', {
			"id": datos.id,
			"titulo": datos.titulo,
			"descripcion": datos.descripcion,
			"precio": datos.precio,
			"noprecio": datos.noprecio,
			"action": "update",
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
					
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
	
	this.del = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		$.post('cmembresias', {
			"id": datos.id,
			"action": "del",
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
					
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
};