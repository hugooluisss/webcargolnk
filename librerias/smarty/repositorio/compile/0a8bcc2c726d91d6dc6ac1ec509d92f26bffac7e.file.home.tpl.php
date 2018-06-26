<?php /* Smarty version Smarty-3.1.11, created on 2018-06-26 13:14:13
         compiled from "templates/plantillas/modulos/frontend/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16539928555b31359450c5b3-95776298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a8bcc2c726d91d6dc6ac1ec509d92f26bffac7e' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/home.tpl',
      1 => 1530036795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16539928555b31359450c5b3-95776298',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b31359454ec26_76204578',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b31359454ec26_76204578')) {function content_5b31359454ec26_76204578($_smarty_tpl) {?><div class="container">
	<div class="row">
		<div class="col-12 col-sm-7">
			<div class="card card-transparente">
				<div class="card-body">
					<h2>LOGISTICA INTELIGENTE</h2>
					Agil - seguro - confiable - sustentable
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-5">
			<div class="card card-default">
				<div class="card-body">
					<form id="frmCotiza">
						<div class="row">
							<div class="col-xs-12">
								<h3>Ingresa tus datos y consulta nuestras ofertas</h3>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-md-6">
								<input id="txtNombre" name="txtNombre" class="form-control" placeholder="Nombre" />
							</div>
							<div class="col-md-6">
								<input id="txtApellidos" name="txtApellidos" class="form-control" placeholder="Apellidos" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input id="txtEmail" name="txtEmail" class="form-control" placeholder="E-mail *" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input id="txtTelefono" name="txtTelefono" class="form-control" placeholder="Teléfono" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input id="txtTipoCarga" name="txtTipoCarga" class="form-control" placeholder="¿ Que tipo de carga?" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<textarea id="txtDetalle" name="txtDetalle" class="form-control" placeholder="Escribe el detalle de tu cotización" rows="5"></textarea>
							</div>
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-link">Cotizar ahora</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>