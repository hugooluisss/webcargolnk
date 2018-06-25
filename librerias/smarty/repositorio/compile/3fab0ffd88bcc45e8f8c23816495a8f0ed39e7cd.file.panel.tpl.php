<?php /* Smarty version Smarty-3.1.11, created on 2018-01-17 13:53:31
         compiled from "templates/plantillas/modulos/paqueterias/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11713755665a5fa9b03441b5-03027851%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fab0ffd88bcc45e8f8c23816495a8f0ed39e7cd' => 
    array (
      0 => 'templates/plantillas/modulos/paqueterias/panel.tpl',
      1 => 1516218809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11713755665a5fa9b03441b5-03027851',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a5fa9b0363625_39020613',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5fa9b0363625_39020613')) {function content_5a5fa9b0363625_39020613($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Servicios de paquetería</h1>
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
						<label for="txtUrl" class="col-sm-2 control-label">URL</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtUrl" name="txtUrl">
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