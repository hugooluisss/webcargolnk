<?php /* Smarty version Smarty-3.1.11, created on 2018-05-09 09:19:32
         compiled from "templates/plantillas/modulos/usuarios/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14663439385a870948253c56-23603944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75fca16c9665563fbe115b9d9483a90d1409c54e' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/panel.tpl',
      1 => 1525875551,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14663439385a870948253c56-23603944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a8709482b36c6_72071313',
  'variables' => 
  array (
    'tipos' => 0,
    'key' => 0,
    'item' => 0,
    'unidades' => 0,
    'puestos' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a8709482b36c6_72071313')) {function content_5a8709482b36c6_72071313($_smarty_tpl) {?><div class="row">
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
						<label for="selUnidad" class="col-sm-3 control-label">Unidad</label>
						<div class="col-sm-6">
							<select class="form-control" id="selUnidad" name="selUnidad">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['unidades']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
						<label for="selPuesto" class="col-sm-3 control-label">Puestos</label>
						<div class="col-sm-6">
							<select class="form-control" id="selPuesto" name="selPuesto">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['puestos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
						<label for="txtNombre" class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtNombre" name="txtNombre" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtApellidos" class="col-sm-3 control-label">Apellidos</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtApellidos" name="txtApellidos" />
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
						<label for="txtNacimiento" class="col-sm-3 control-label">Fecha de Nacimiento</label>
						<div class="col-sm-2">
							<input class="form-control" id="txtNacimiento" name="txtNacimiento" type="text" readonly="true" placeholder="YYYY-mm-dd"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNumEmp" class="col-sm-3 control-label">Número de empleado</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtNumEmp" name="txtNumEmp" type="text"/>
						</div>
						<label for="txtFechaIngreso" class="col-sm-3 control-label">Fecha de ingreso</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFechaIngreso" name="txtFechaIngreso" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtIMSS" class="col-sm-3 control-label">Número IMSS</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtIMSS" name="txtIMSS" type="text"/>
						</div>
						<label for="txtRFC" class="col-sm-3 control-label">RFC</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtRFC" name="txtRFC" type="text"/>
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
</div><?php }} ?>