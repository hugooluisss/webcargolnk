<?php /* Smarty version Smarty-3.1.11, created on 2018-01-17 12:42:13
         compiled from "templates/plantillas/modulos/cotizador/winFacturar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4892532875a5f9905f139d8-68826226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '914e3d5a700e3fd60137df28d82be91163e4d1ba' => 
    array (
      0 => 'templates/plantillas/modulos/cotizador/winFacturar.tpl',
      1 => 1516211517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4892532875a5f9905f139d8-68826226',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a5f9905f16007_17261119',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5f9905f16007_17261119')) {function content_5a5f9905f16007_17261119($_smarty_tpl) {?><div class="modal fade" id="winFacturar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Pedido <span campo="idPedido"></span></h3>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning">
					<p>Por favor espera mientras traemos los datos</p>
				</div>
				
				<div class="form-group">
					<label for="" class="col-md-4 control-label">Fecha</label>
					<div class="col-md-3">
						<input class="form-control" campo="fecha" disabled="true" readonly="true"/>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-4 control-label">Subtotal</label>
					<div class="col-md-3">
						<input class="form-control" campo="subtotal" disabled="true" readonly="true"/>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-4 control-label">Envío</label>
					<div class="col-md-3">
						<input class="form-control" campo="envio" disabled="true" readonly="true"/>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-md-4 control-label">Total</label>
					<div class="col-md-3">
						<input class="form-control" campo="total" disabled="true" readonly="true"/>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>