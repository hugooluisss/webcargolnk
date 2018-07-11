<?php /* Smarty version Smarty-3.1.11, created on 2018-07-11 09:40:36
         compiled from "templates/plantillas/modulos/ordenes/winMapa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15949322255b46153cbaa149-51106866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '245c1b0b3911d5a24813849061da9f83b172ba27' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/winMapa.tpl',
      1 => 1531320035,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15949322255b46153cbaa149-51106866',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b46153cbc5b54_08060768',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b46153cbc5b54_08060768')) {function content_5b46153cbc5b54_08060768($_smarty_tpl) {?><div class="modal fade" id="winMapa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubicar punto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
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
					<div class="col-12">
						<textarea rows="3" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Dirección"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btnUbicacion">Seleccionar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>