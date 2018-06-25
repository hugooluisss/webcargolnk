$(document).ready(function(){
	$("form:not(.filter) :input:visible:enabled:first").focus();
	
	$("#frmLogin").validate({
		debug: true,
		rules: {
			txtUsuario: "required",
			txtPass: "required"
		},
		wrapper: 'span', 
		submitHandler: function(form){
			var obj = new TUsuario;
			
			$("[type=submit]").prop("disabled", true);
			
			$.post('?mod=clogin&action=login', {
				"usuario": $("#txtUsuario").val(),
				"pass": $("#txtPass").val(),
				"action": "login"
			}, function(data){
				$("[type=submit]").prop("disabled", false);
				if (data.band)
					location.href = "route";
				else{
					alert("Los datos son incorrectos, corrigelos y vuelve a intentarlo");
					$("form:not(.filter) :input:visible:enabled:first").focus();
				}
			}, "json");
        }

    });
});