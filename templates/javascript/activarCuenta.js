$(document).ready(function(){
	$("#code").text($("#selPais").val());
	
	$("#txtTelefono").val($("#txtTelefono").val().replace($("#selPais").val(), ''));
	
	$("#selPais").change(function(){
		$("#code").text($("#selPais").val());
		$("#txtTelefono").val($("#txtTelefono").val().replace($("#selPais").val(), ''));
	});
	
	$("#btnSolicitarCodigo").click(function(){
		if ($("#txtTelefono").val() == ''){
			alert("Indica tu número de celular");
			$("#txtTelefono").focus();
		}else{
			var usuario = new TUsuario;
			usuario.requestCodigoActivacion({
				celular: $("#selPais").val() + $("#txtTelefono").val(),
				fn: {
					before: function(){
						$("#btnSolicitarCodigo").prop("disabled", true);
					}, after: function(resp){
						$("#btnSolicitarCodigo").prop("disabled", false);
						
						if (resp.band)
							alert("El código se envió a tu celular");
						else
							alert("No se pudo enviar el código, intenta más tarde");
					}
				}
			});
		}
	});
	
	
	$("#btnEnviarCodigo").click(function(){
		if ($("#txtCodigo").val() == '' || $("#txtCodigo").val() == '000000'){
			alert("Indica tu código");
			$("#txtCodigo").focus();
		}else{
			var usuario = new TUsuario;
			usuario.activarCuenta({
				codigo: $("#txtCodigo").val(),
				fn: {
					before: function(){
						$("#btnEnviarCodigo").prop("disabled", true);
					}, after: function(resp){
						$("#btnEnviarCodigo").prop("disabled", false);
						
						if (resp.band){
							alert("Listo, tu cuenta está activada");
							location.href = "cotizador";
						}else
							alert("Código incorrecto");
					}
				}
			});
		}
	});
});