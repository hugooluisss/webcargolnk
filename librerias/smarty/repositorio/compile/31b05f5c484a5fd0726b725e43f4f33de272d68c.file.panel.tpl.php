<?php /* Smarty version Smarty-3.1.11, created on 2018-07-06 12:58:46
         compiled from "templates/plantillas/modulos/tipocamion/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8936345095b3fadd6066470-95802734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31b05f5c484a5fd0726b725e43f4f33de272d68c' => 
    array (
      0 => 'templates/plantillas/modulos/tipocamion/panel.tpl',
      1 => 1530899710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8936345095b3fadd6066470-95802734',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b3fadd6087568_34867777',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3fadd6087568_34867777')) {function content_5b3fadd6087568_34867777($_smarty_tpl) {?><div class="row">
	<div class="col-md-12">
		<h1 class="page-header">
			Catálogo de tipo de camiones
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
						<label for="txtDescripcion" class="col-md-2">Descripción</label>
						<div class="col-md-6">
							<input class="form-control" id="txtDescripcion" name="txtDescripcion">
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