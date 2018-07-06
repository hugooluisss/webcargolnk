<?php /* Smarty version Smarty-3.1.11, created on 2018-07-06 14:01:10
         compiled from "templates/plantillas/modulos/transportistas/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2836947695b3fbc76d2f769-82694821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c196b8f2383dcb9a7a6f46da66008ba5c332cd7' => 
    array (
      0 => 'templates/plantillas/modulos/transportistas/panel.tpl',
      1 => 1530903645,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2836947695b3fbc76d2f769-82694821',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tipoCamion' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b3fbc76d5ede1_12128088',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3fbc76d5ede1_12128088')) {function content_5b3fbc76d5ede1_12128088($_smarty_tpl) {?><div class="row">
	<div class="col-md-12">
		<h1 class="page-header">
			Transportistas
		</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-pills">
  <li class="nav-item">
  	<a class="nav-link active" role="tab" data-toggle="pill" href="#listas">Lista</a>
  </li>
  <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane container active">
		<div id="dvLista">
		</div>
	</div>
	
	<div id="add" class="tab-pane container">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="card">
				<div class="card-body">
					<div class="form-group row">
						<label for="selTipo" class="col-md-2">Tipo Camion</label>
						<div class="col-md-4">
							<select class="form-control" id="selPerfil" name="selPerfil">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tipoCamion']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idTipo'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtNombre" class="col-md-2">Nombre</label>
						<div class="col-md-6">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtEmail" class="col-md-2">Correo electrónico</label>
						<div class="col-md-3">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtPass" class="col-md-2">Contraseña</label>
						<div class="col-md-3">
							<input class="form-control" id="txtPass" name="txtPass" type="password">
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>