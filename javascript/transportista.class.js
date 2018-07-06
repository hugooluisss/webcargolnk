TTransportista = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('ctransportista', {
				"id": datos.id,
				"razonSocial": datos.razonSocial,
				"tipoCamion": datos.tipoCamion,
				"representante": datos.email, 
				"rut": datos.rut,
				"patente": datos.patente,
				"correo": datos.correo,
				"pass": datos.pass,
				"calificacion": datos.calificacion,
				"aprobado": datos.aprobado,
				"situacion": datos.situacion,
				"action": "add"
			}, function(data){
				if (data.band == false)
					console.log("No se guardó el registro");
					
				if (datos.fn.after !== undefined)
					datos.fn.after(data);
			}, "json");
	};
	
	this.del = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		$.post('ctransportista', {
			"id": datos.id,
			"action": "del"
		}, function(data){
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
					
			if (data.band == 'false'){
				console.log("Ocurrió un error al eliminar");
			}
		}, "json");
	};
};