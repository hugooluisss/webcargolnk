<?php /* Smarty version Smarty-3.1.11, created on 2018-01-17 10:58:46
         compiled from "templates/plantillas/modulos/pedidos/winDetalleProducto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9646684265a5be40894c874-22958274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60b135a95e6da43475d5389ec89cf42e334ad22a' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/winDetalleProducto.tpl',
      1 => 1516207307,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9646684265a5be40894c874-22958274',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a5be4089502f4_86239097',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5be4089502f4_86239097')) {function content_5a5be4089502f4_86239097($_smarty_tpl) {?><form role="form" id="frmAddProducto" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winDetalleProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Producto</h3>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label for="" class="col-md-4 control-label">Código</label>
						<div class="col-md-3">
							<input class="form-control" campo="codigo" disabled="true" readonly="true"/>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-4 control-label">Descripción</label>
						<div class="col-md-8">
							<input class="form-control" campo="descripcion" disabled="true" readonly="true"/>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-4 control-label">Descripción larga</label>
						<div class="col-md-8">
							<textarea class="form-control" campo="descripcionlarga" disabled="true" readonly="true" rows="4"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-md-4 control-label">Precio</label>
						<div class="col-md-8">
							<input class="form-control text-right" campo="precio1" disabled="true" readonly="true"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCantidad" class="col-md-4 control-label">Peso</label>
						<div class="col-md-3">
							<input class="form-control text-right" campo="peso" disabled="true" readonly="true"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCantidad" class="col-md-4 control-label">Marca</label>
						<div class="col-md-3">
							<input class="form-control text-right" campo="marca" disabled="true" readonly="true"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCantidad" class="col-md-4 control-label">Tipo</label>
						<div class="col-md-3">
							<input class="form-control text-right" campo="tipo" disabled="true" readonly="true"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCantidad" class="col-md-4 control-label">Cantidad</label>
						<div class="col-md-3">
							<input class="form-control text-right" id="txtCantidad" name="txtCantidad"/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Agregar</button>
				</div>
			</div>
		</div>
	</div>
</form><?php }} ?>