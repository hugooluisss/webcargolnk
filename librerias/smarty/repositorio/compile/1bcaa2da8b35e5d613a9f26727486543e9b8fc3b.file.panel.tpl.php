<?php /* Smarty version Smarty-3.1.11, created on 2018-03-14 21:55:47
         compiled from "templates/plantillas/modulos/archivos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18455590295aa9e3ec5aeef8-07711516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bcaa2da8b35e5d613a9f26727486543e9b8fc3b' => 
    array (
      0 => 'templates/plantillas/modulos/archivos/panel.tpl',
      1 => 1521086146,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18455590295aa9e3ec5aeef8-07711516',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5aa9e3ec6a7509_38877325',
  'variables' => 
  array (
    'departamentos' => 0,
    'row' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa9e3ec6a7509_38877325')) {function content_5aa9e3ec6a7509_38877325($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Archivos</h1>
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
						<label for="txtTitulo" class="col-sm-2 control-label">Título</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtTitulo" name="txtTitulo" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtSubtitulo" class="col-sm-2 control-label">Subtítulo</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtSubtitulo" name="txtSubtitulo" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtRegistro" class="col-sm-2 control-label">Fecha de registro</label>
						<div class="col-sm-3">
							<input id="txtRegistro" name="txtRegistro" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label for="selDepartamento" class="col-sm-2 control-label">Departamento</label>
						<div class="col-sm-10">
							<select id="selDepartamento" name="selDepartamento" class="form-control">
								<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['departamentos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idDepartamento'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selPublicado" class="col-sm-2 control-label">Publciado</label>
						<div class="col-sm-10">
							<select id="selPublicado" name="selPublicado" class="form-control">
								<option value="1">Si</option>
								<option value="0">No</option>
							</select>
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

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/archivos/winUpload.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>