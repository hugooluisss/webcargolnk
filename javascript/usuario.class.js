TUsuario = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cusuarios', {
				"id": datos.id,
				"nombre": datos.nombre,
				"apellidos": datos.apellidos,
				"email": datos.email, 
				"pass": datos.pass,
				"perfil": datos.perfil,
				"unidad": datos.unidad,
				"puesto": datos.puesto,
				"nacimiento": datos.nacimiento,
				"numemp": datos.numemp,
				"imss": datos.imss,
				"rfc": datos.rfc,
				"fechaingreso": datos.ingreso,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
	
	this.del = function(usuario, fn){
		$.post('cusuarios', {
			"usuario": usuario,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == false){
				console.log("Ocurrió un error al eliminar al usuario");
			}
		}, "json");
	};
};