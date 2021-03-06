TTransportista = function(){
	var self = this;
	
	this.add = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('ctransportistas', {
				"id": datos.id,
				"razonSocial": datos.razonSocial,
				"tipoCamion": datos.tipoCamion,
				"representante": datos.representante, 
				"rut": datos.rut,
				"patente": datos.patente,
				"correo": datos.correo,
				"pass": datos.pass,
				"calificacion": datos.calificacion,
				"aprobado": datos.aprobado,
				"situacion": datos.situacion,
				"telefono": datos.telefono,
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
		$.post('ctransportistas', {
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
	
	this.asignar = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cordenes', {
			"orden": datos.orden,
			"transportista": datos.transportista,
			"monto": datos.monto,
			"action": "asignar"
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
				
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	};
};