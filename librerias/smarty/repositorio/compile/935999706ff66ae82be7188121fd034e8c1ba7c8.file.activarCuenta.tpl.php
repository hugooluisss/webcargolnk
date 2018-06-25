<?php /* Smarty version Smarty-3.1.11, created on 2018-01-24 12:48:09
         compiled from "templates/plantillas/modulos/usuarios/activarCuenta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11426356095a67add33587d5-20772503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '935999706ff66ae82be7188121fd034e8c1ba7c8' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/activarCuenta.tpl',
      1 => 1516746553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11426356095a67add33587d5-20772503',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a67add33af9b9_38728159',
  'variables' => 
  array (
    'paises' => 0,
    'row' => 0,
    'key' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a67add33af9b9_38728159')) {function content_5a67add33af9b9_38728159($_smarty_tpl) {?><div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<h1 class="page-header">Activa y confirma tu cuenta</h1>
	</div>
</div>

<div class="row" panel="solicitar">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<div class="box">
			<div class="box-body">
				Muchas gracias por realizar el registro, te solicitamos que confirmes tu número de celular, al cual se te enviará un código de activación
				
				<div class="form-group has-feedback">
					<select class="form-control" id="selPais" name="selPais">
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['paises']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["row"]->key;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group has-feedback">
					<div class="input-group">
						<span class="input-group-addon" id="code"></span>
						<input type="tel" class="form-control" placeholder="Teléfono" id="txtTelefono" name="txtTelefono" value="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getTelefono();?>
">
						<span class="glyphicon glyphicon-phone form-control-feedback"></span>
					</div>
					
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary btn-block" id="btnSolicitarCodigo">Solicitar código</button>
			</div>
		</div>
	</div>
</div>


<div class="row" panel="activar">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<div class="box">
			<div class="box-body">
				<p><b>¿Tienes el código?</b> Escribelo para activar tu cuenta</p>
				
				<input type="text" class="form-control" placeholder="Código" id="txtCodigo" name="txtCodigo" value="000000">
			</div>
			<div class="box-footer">
				<button class="btn btn-success btn-block" id="btnEnviarCodigo">Enviar código para activar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>