$(document).ready(function(){
	$("#frmRegistro").validate({
		errorClass: "validateError",
		debug: true,
		rules: {
			txtNombre: {
				required : true,
				email: false
			},
			txtCorreo: {
				required : true,
				email: true,
				remote: {
					url: "clogin",
					type: "post",
					data: {
						action: "validaEmail",
						"movil": 1
					}
				}
			},
			txtPass: {
				required : true,
				minlength: 5
			},
			txtPass2: {
				required : true,
				minlength: 5,
				equalTo: "#frmRegistro #txtPass"
			},
			txtTelefono: {
				required: true
			},
			txtDireccion: {
				required: true
			}
		},
		wrapper: 'span', 
		messages: {
			txtCorreo: {
				remote: "Este correo ya se encuentra registrado"
			}
		},
		submitHandler: function(form){
			var obj = new TUsuario;
			form = $(form);
			obj.registrar({
				nombre: form.find("#txtNombre").val(), 
				email: form.find("#txtCorreo").val(),
				pass: form.find("#txtPass").val(), 
				telefono: form.find("#txtTelefono").val(), 
				direccion: form.find("#txtDireccion").val(), 
				fn:{
					before: function(){
						form.find("[type=submit]").prop("disabled", true);
					},
					after: function(data){
						form.find("[type=submit]").prop("disabled", false);
						
						if (data.band == false){
							alert("Ocurrió un error al registrar la cuenta, inténtelo más tarde");
						}else{
							alert("Bienvenido " + form.find("#txtNombre").val() + ", haz quedado registrado...");
							location.href = "inicio";
						}
					}
				}
			});
		}
	});
});