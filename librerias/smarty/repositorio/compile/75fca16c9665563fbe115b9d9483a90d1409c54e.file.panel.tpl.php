<?php /* Smarty version Smarty-3.1.11, created on 2018-01-25 10:39:26
         compiled from "templates/plantillas/modulos/usuarios/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2655053305a58ca7d90ec17-23576126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75fca16c9665563fbe115b9d9483a90d1409c54e' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/panel.tpl',
      1 => 1516898365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2655053305a58ca7d90ec17-23576126',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58ca7d9a5d33_01702156',
  'variables' => 
  array (
    'tipos' => 0,
    'key' => 0,
    'item' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58ca7d9a5d33_01702156')) {function content_5a58ca7d9a5d33_01702156($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Administración de usuarios</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">	
					<div class="form-group">
						<label for="selPerfil" class="col-sm-3 control-label">Perfil</label>
						<div class="col-sm-6">
							<select class="form-control" id="selPerfil" name="selPerfil">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>

								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-sm-3 control-label">Nombre completo</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtNombre" name="txtNombre" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-sm-3 control-label">Correo electrónico</label>
						<div class="col-sm-6">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtPass" class="col-sm-3 control-label">Contraseña</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtPass" name="txtPass" type="password" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtTelefono" class="col-sm-3 control-label">Teléfono</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtTelefono" name="txtTelefono" type="tel" />
							<span class="help-block">Incluye el código del país</span>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDireccion" class="col-sm-3 control-label">Dirección</label>
						<div class="col-sm-9">
							<textarea rows="4" id="txtDireccion" name="txtDireccion" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/usuarios/winSuscripciones.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>