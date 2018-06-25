TMovimiento = function(){
	var self = this;
	
	this.update = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		$.post('cmovimientos', {
			"id": datos.id,
			"cantidad": datos.cantidad,
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
		$.post('cmovimientos', {
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