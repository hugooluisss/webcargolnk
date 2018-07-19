<?php /* Smarty version Smarty-3.1.11, created on 2018-07-18 13:09:56
         compiled from "templates/plantillas/modulos/frontend/winMapa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18014452915b4f82741d4f30-56674007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb1475df840a0e051411bc966b53f37225d97dde' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/winMapa.tpl',
      1 => 1530212565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18014452915b4f82741d4f30-56674007',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b4f82741dc4b2_13525037',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4f82741dc4b2_13525037')) {function content_5b4f82741dc4b2_13525037($_smarty_tpl) {?><div class="modal modal-limpia" tabindex="-1" role="dialog" id="winMapa">
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