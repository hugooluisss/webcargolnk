TUnidad = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cunidades', {
				"id": datos.id,
				"clave": datos.clave,
				"nombre": datos.nombre, 
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
	
	this.del = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cunidades', {
			"id": datos.id,
			"action": "del"
		}, function(data){
			if (datos.fn.after != undefined)
				datos.fn.after(data);
				
			if (data.band == false){
				console.log("Ocurrió un error al eliminar");
			}
		}, "json");
	};
};