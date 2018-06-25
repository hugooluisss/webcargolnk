<?php /* Smarty version Smarty-3.1.11, created on 2018-03-13 22:07:50
         compiled from "templates/plantillas/modulos/eventos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7728197785aa8a0166d24b8-72247767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7746112cb447b8988bfc55981a26de0859af780b' => 
    array (
      0 => 'templates/plantillas/modulos/eventos/panel.tpl',
      1 => 1521000342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7728197785aa8a0166d24b8-72247767',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'departamentos' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5aa8a01686b303_44488699',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa8a01686b303_44488699')) {function content_5aa8a01686b303_44488699($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Eventos</h1>
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
					<div class="form-group">
						<label for="txtFecha" class="col-sm-2 control-label">Fecha</label>
						<div class="col-sm-3">
							<input id="txtFecha" name="txtFecha" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtLugar" class="col-sm-2 control-label">Lugar</label>
						<div class="col-sm-10">
							<input id="txtLugar" name="txtLugar" class="form-control" />
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