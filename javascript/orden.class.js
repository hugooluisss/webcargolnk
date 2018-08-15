TOrden = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cordenes', {
				"id": datos.id,
				"estado": datos.estado,
				"tipoCamion": datos.tipoCamion,
				"correo": datos.correo,
				"telefono": datos.telefono,
				"descripcion": datos.descripcion,
				"fechaServicio": datos.fechaServicio,
				"plazo": datos.plazo,
				"peso": datos.peso,
				"volumen": datos.volumen,
				"origen": datos.origen,
				"destino": datos.destino,
				"presupuesto": datos.presupuesto,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log("No se guardaron los datos");
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(id, fn){
		$.post('cordenes', {
			"id": id,
			"action": "del"
		}, function(data){
			if (fn.after != undefined)
				fn.after(data);
			if (data.band == false){
				console.log("No se pudo borrar");
			}
		}, "json");
	};
	
	this.getIdByFolio = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cordenes', {
				"codigo": datos.codigo,
				"action": "findCodigo"
			}, function(data){
				if (data.band == false)
					console.log("No se encontró el código");
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
	
	this.quitarAsignacion = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cordenes', {
				"orden": datos.id,
				"action": "desasignar"
			}, function(data){
				if (data.band == false)
					console.log("No se realizó la desasignación");
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
	
	this.getLastPosicion = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cordenes', {
				"orden": datos.id,
				"action": "getLastPosicion"
			}, function(data){
				if (data.band == false)
					console.log("No se realizó la desasignación");
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	}
};