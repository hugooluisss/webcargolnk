TEstado = function(){
	var self = this;
	
	this.add = function(id,	nombre, color, fn){
		if (fn.before !== undefined) fn.before();
		
		$.post('cestados', {
				"id": id,
				"nombre": nombre,
				"color": color,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (fn.after !== undefined)
					fn.after(data);
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
				alert("Ocurrió un error al eliminar el estado");
			}
		}, "json");
	};
};