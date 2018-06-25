<?php /* Smarty version Smarty-3.1.11, created on 2018-01-30 13:50:34
         compiled from "templates/plantillas/modulos/usuarios/registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19190823895a669fdf0eb0a3-29607985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44aef2f9887dfb115ffa8db20a4f38d37d014834' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/registro.tpl',
      1 => 1515766651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19190823895a669fdf0eb0a3-29607985',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a669fdf1822e7_84467583',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a669fdf1822e7_84467583')) {function content_5a669fdf1822e7_84467583($_smarty_tpl) {?><center>
	<img style="max-width: 400px;" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
img/logo.png" />
	<br />
	<h3>Registro de clientes</h3>
</center>

<br />
<br />

<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
		<form role="form" id="frmRegistro" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtNombre" class="col-md-4 control-label">Nombre completo</label>
				<div class="col-md-8">
					<input class="form-control" id="txtNombre" name="txtNombre" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtCorreo" class="col-md-4 control-label">Correo electrónico</label>
				<div class="col-md-8">
					<input class="form-control" id="txtCorreo" name="txtCorreo" type="email" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtTelefono" class="col-md-4 control-label">Teléfono</label>
				<div class="col-md-8">
					<input class="form-control" id="txtTelefono" name="txtTelefono" type="tel" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtPass" class="col-md-4 control-label">Contraseña</label>
				<div class="col-md-8">
					<input class="form-control" id="txtPass" name="txtPass" type="password" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtPass" class="col-md-4 control-label">Confirma</label>
				<div class="col-md-8">
					<input class="form-control" id="txtPass2" name="txtPass2" type="password" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-md-4 control-label">Dirección</label>
				<div class="col-md-8">
					<textarea id="txtDireccion" name="txtDireccion" class="form-control" rows="4" placeholder="Esta dirección será utilizada para los envíos"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-12 text-right">
						<button type="submit" class="btn btn-primary">Registrarme</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>