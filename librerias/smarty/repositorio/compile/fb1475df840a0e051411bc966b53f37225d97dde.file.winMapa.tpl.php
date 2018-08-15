<?php /* Smarty version Smarty-3.1.11, created on 2018-08-14 22:29:53
         compiled from "templates/plantillas/modulos/frontend/winMapa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6153310655b739e3114bb19-70554804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '6153310655b739e3114bb19-70554804',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b739e3114fb22_92929435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b739e3114fb22_92929435')) {function content_5b739e3114fb22_92929435($_smarty_tpl) {?><div class="modal modal-limpia" tabindex="-1" role="dialog" id="winMapa">
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