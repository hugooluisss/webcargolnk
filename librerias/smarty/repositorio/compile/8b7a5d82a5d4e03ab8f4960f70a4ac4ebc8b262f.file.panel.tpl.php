<?php /* Smarty version Smarty-3.1.11, created on 2018-03-22 12:15:17
         compiled from "templates/plantillas/modulos/secciones/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10464645235ab3f213709cc2-17579176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b7a5d82a5d4e03ab8f4960f70a4ac4ebc8b262f' => 
    array (
      0 => 'templates/plantillas/modulos/secciones/panel.tpl',
      1 => 1521742516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10464645235ab3f213709cc2-17579176',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5ab3f21379d7d8_34149589',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab3f21379d7d8_34149589')) {function content_5ab3f21379d7d8_34149589($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Secciones</h1>
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
						<label for="txtReferencia" class="col-sm-2 control-label">Referencia</label>
						<div class="col-sm-6">
							<input class="form-control" id="txtReferencia" name="txtReferencia" />
						</div>
					</div>
					<div class="form-group">
						<label for="selPublicado" class="col-sm-2 control-label">Publcado</label>
						<div class="col-sm-4">
							<select id="selPublicado" name="selPublicado" class="form-control">
								<option value="1">Si</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCuerpo" class="col-sm-2 control-label">Cuerpo (HTML)</label>
						<div class="col-sm-10">
							<textarea name="txtCuerpo" id="txtCuerpo" rows="10" class="form-control"></textarea>
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