TPedido = function(){
	var self = this;
	
	this.nuevo = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		$.post('ccotizador', {
			"action": "nuevoPedido",
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
					
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
	
	this.getData = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cpedidos', {
			"id": datos.id,
			"action": "getDatos"
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
				
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
	
	this.addMovimiento = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('ccotizador', {
			"movimiento": datos.id,
			"pedido": datos.pedido,
			"producto": datos.producto,
			"cantidad": datos.cantidad,
			"action": "addMovimiento"
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
				
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	};
	
	this.setEstado = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('ccotizador', {
			"id": datos.pedido,
			"estado": datos.estado,
			"action": "setEstado"
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
				
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
	
	this.setEnvio = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cpedidos', {
			"id": datos.id,
			"envio": datos.envio,
			"action": "setEnvio"
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
				
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
	
	this.addEnvioPaqueteria = function(datos){
		if (datos.fn.before !== undefined) datos.fn.before();
		
		$.post('cpedidos', {
			"id": datos.pedido,
			"paqueteria": datos.paqueteria,
			"guia": datos.guia,
			"action": "setPaqueteria"
		}, function(data){
			if (data.band == false)
				console.log(data.mensaje);
				
			if (datos.fn.after !== undefined)
				datos.fn.after(data);
		}, "json");
	}
};