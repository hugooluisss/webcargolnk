TUsuario = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cusuarios', {
				"id": datos.id,
				"nombre": datos.nombre,
				"email": datos.email, 
				"pass": datos.pass,
				"perfil": datos.perfil,
				"empresa": datos.empresa,
				"transportista": datos.transportista,
				"nit": datos.nit,
				"celular": datos.celular,
				"patentecamion": datos.patentecamion,
				"patenterampla": datos.patenterampla,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log("No se guardó el registro");
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(usuario, fn){
		$.post('?mod=cusuarios&action=del', {
			"usuario": usuario,
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar al usuario");
			}
		}, "json");
	};
	
	this.login = function(usuario, pass, fn){
		if (fn.before !== undefined)
			fn.before();
			
		$.post('clogin', {
			"usuario": usuario,
			"pass": pass,
			"action": "login"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == 'false'){
				console.log("Los datos del usuario no son válidos");
			}
		}, "json");
	}
};