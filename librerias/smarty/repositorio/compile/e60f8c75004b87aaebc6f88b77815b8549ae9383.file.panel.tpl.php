<?php /* Smarty version Smarty-3.1.11, created on 2018-03-06 11:33:33
         compiled from "templates/plantillas/modulos/unidades/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10652974355a9ed0edaa0266-20192604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e60f8c75004b87aaebc6f88b77815b8549ae9383' => 
    array (
      0 => 'templates/plantillas/modulos/unidades/panel.tpl',
      1 => 1518729688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10652974355a9ed0edaa0266-20192604',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a9ed0edb1e1b0_34915981',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a9ed0edb1e1b0_34915981')) {function content_5a9ed0edb1e1b0_34915981($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Catálogo de unidades</h1>
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
						<label for="txtTitulo" class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtClave" name="txtClave" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtNombre" name="txtNombre" />
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