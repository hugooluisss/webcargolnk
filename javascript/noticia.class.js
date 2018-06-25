TNoticia = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('citems', {
				"id": datos.id,
				"cuerpo": datos.cuerpo,
				"resumen": datos.resumen, 
				"departamento": datos.departamento,
				"titulo": datos.titulo,
				"publicado": datos.publicado,
				"tipo": 1,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
};