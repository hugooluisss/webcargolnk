<?php /* Smarty version Smarty-3.1.11, created on 2018-06-27 11:49:18
         compiled from "templates/plantillas/modulos/frontend/winMapa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2420667525b33afd0541b69-93390804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb1475df840a0e051411bc966b53f37225d97dde' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/winMapa.tpl',
      1 => 1530118072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2420667525b33afd0541b69-93390804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b33afd0543da6_31190865',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b33afd0543da6_31190865')) {function content_5b33afd0543da6_31190865($_smarty_tpl) {?><div class="modal modal-limpia" tabindex="-1" role="dialog" id="winMapa">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<input type="text" class="form-control" placeholder="Escribe la dirección a buscar" id="txtBuscarDireccion"/>
					</div>
				</div>
				<br />
				<div class="row">
					<div id="dvMapa" class="col-12" style="height: 300px">&nbsp;</div>
				</div>
				<br />
				<div class="row">
					<div class="col-md-12">
						<textarea rows="3" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Dirección"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btnDefinir">Definir</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>