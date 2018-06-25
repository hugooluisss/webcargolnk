TUsuario = function(){
	var self = this;
	
	this.registrar = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('clogin', {
				"id": datos.id,
				"nombre": datos.nombre,
				"email": datos.email, 
				"pass": datos.pass,
				"perfil": datos.perfil,
				"direccion": datos.direccion,
				"telefono": datos.telefono,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cusuarios', {
				"id": datos.id,
				"nombre": datos.nombre,
				"email": datos.email, 
				"pass": datos.pass,
				"perfil": datos.perfil,
				"direccion": datos.direccion,
				"telefono": datos.telefono,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log(data.mensaje);
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
	
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
			
		$.post('?mod=clogin&action=login', {
			"usuario": usuario,
			"pass": pass
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
				
			if (data.band == false){
				console.log("Los datos del usuario no son válidos");
			}
		}, "json");
	}
	
	this.requestCodigoActivacion = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cusuarios', {
			"telefono": datos.celular,
			"action": "solicitarCodigo"
		}, function(data){
			if (data.band == false)
				console.log("Ocurrió un error al solicitar el código de activación");
					
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	};
	
	this.activarCuenta = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cusuarios', {
			"codigo": datos.codigo,
			"action": "activarCuenta"
		}, function(data){
			if (data.band == false)
				console.log("Ocurrió un error al enviar el código de activación");
					
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	};
};