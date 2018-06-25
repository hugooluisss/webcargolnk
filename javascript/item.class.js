TItem = function(){
	var self = this;
	
	this.del = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('citems', {
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
	
	this.getData = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('citems', {
				"id": datos.id,
				"action": "getDatos"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
};