<?php /* Smarty version Smarty-3.1.11, created on 2018-01-12 09:12:44
         compiled from "templates/plantillas/modulos/estados/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6997256455a58cf93501a88-58702857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd90416d9f99fe96685b90c925255f90e8ad6d0c6' => 
    array (
      0 => 'templates/plantillas/modulos/estados/panel.tpl',
      1 => 1515769962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6997256455a58cf93501a88-58702857',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58cf9355deb3_52701847',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58cf9355deb3_52701847')) {function content_5a58cf9355deb3_52701847($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Estado de pedidos</h1>
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
						<label for="txtNombre" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group">
						<label for="txtColor" class="col-sm-2 control-label">Color</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtColor" name="txtColor">
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