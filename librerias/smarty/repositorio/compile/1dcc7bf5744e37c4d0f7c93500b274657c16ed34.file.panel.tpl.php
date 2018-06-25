<?php /* Smarty version Smarty-3.1.11, created on 2018-01-24 21:02:06
         compiled from "templates/plantillas/modulos/membresias/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9028380565a6947cd439068-92122149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1dcc7bf5744e37c4d0f7c93500b274657c16ed34' => 
    array (
      0 => 'templates/plantillas/modulos/membresias/panel.tpl',
      1 => 1516849323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9028380565a6947cd439068-92122149',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6947cd59d1e5_69180567',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6947cd59d1e5_69180567')) {function content_5a6947cd59d1e5_69180567($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Membresias</h1>
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
						<div class="col-sm-3">
							<input class="form-control" id="txtTitulo" name="txtTitulo">
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-sm-2 control-label">Color</label>
						<div class="col-sm-10">
							<textarea id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPrecio" class="col-sm-2 control-label">Precio</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" id="txtPrecio" name="txtPrecio" value="0">
						</div>
					</div>
					<div class="form-group">
						<label for="selPrecio" class="col-sm-2 control-label">No Precio</label>
						<div class="col-sm-2">
							<select id="selPrecio" name="selPrecio" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
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
</div><?php }} ?>