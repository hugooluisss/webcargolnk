<?php /* Smarty version Smarty-3.1.11, created on 2018-01-29 23:21:35
         compiled from "templates/plantillas/modulos/cotizador/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:503055515a58ec777d3496-26249181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb40eedbaaa972cd4d7ca5c880285b90699cfa55' => 
    array (
      0 => 'templates/plantillas/modulos/cotizador/panel.tpl',
      1 => 1517028865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '503055515a58ec777d3496-26249181',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58ec77831bf4_24520438',
  'variables' => 
  array (
    'ini' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58ec77831bf4_24520438')) {function content_5a58ec77831bf4_24520438($_smarty_tpl) {?><div class="container" vista="carrito">
	<div class="row">
		<div class="col-xs-6">
			<button class="btn btn-lg btn-block btn-primary" id="btnNuevoPedido">Nuevo pedido</button>
		</div>
		<div class="col-xs-6">
			<button class="btn btn-lg btn-block btn-default" data-toggle="modal" data-target="#winPedidos">Mis pedidos</button>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-xs-12 col-sm-9 col-md-8">
			<div class="panel panel-success" id="pnlComprobante" style="display: none">
				<div class="panel-heading">
					<h3>Pedido aprobado</h3>
				</div>
				<div class="panel-body">
					<p>
						<b>Tu pedido fue aprobado. Realiza el depósito y sube al sistema el comprobante</b>
					</p>
					<form id="upload" method="post" action="?mod=ccotizador&action=uploadComprobante" enctype="multipart/form-data">
						<input type="file" name="upl" accept="image/jpg,image/jpeg"/>
						<ul class="elementos list-group">
						<!-- The file list will be shown here -->
						</ul>
					</form>
					<input type="hidden" id="url" value="<?php echo $_smarty_tpl->tpl_vars['ini']->value['sistema']['url'];?>
"/>
					
					<form method="post" action="https://www.paypal.com/cgi-bin/webscr" id="formPaypal">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="add" value="1">
						<input type="hidden" name="business" value="<?php echo $_smarty_tpl->tpl_vars['ini']->value['paypal']['email'];?>
">
						<input type="hidden" name="item_name" campo="titulo" value="Membresia">
						<input type="hidden" name="item_number" value="">
						<input type="hidden" name="amount" campo="precio" value="">
						<input type="hidden" name="shipping" value="0">
						<input type="hidden" name="shipping2" value="0">
						<input type="hidden" name="handling" value="0 ">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="undefined_quantity" value="1">
						<input type="hidden" name="return" campo="retorno"/>
						<p class="text-success">O bien, paga ahora por Paypal</p>
						<span id="paypalTotal" class="text-success"></span>
						<span class="text-success"> + 4% (comision paypal) = </span>
						<button type="submit" name="submit" class="btn btn-success"> <i class="fa fa-paypal" aria-hidden="true"></i></button>
					</form>
					
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-3 col-md-4">
			<div class="panel">
				<div class="panel-body">
					<input type="text" class="form-control text-right" id="pedido" value="" disabled="true" readonly="true" placeholder="Número de pedido"/>
					<br />
					<button class="btn btn-lg btn-block btn-primary" showVista="productos">Productos</button>
				</div>
			</div>
		</div>
	</div>
	<div id="dvDatosCompra">
	</div>
	<div class="row">
		<div class="col-xs-12">
			<button class="btn btn-lg btn-block btn-danger" id="btnFinalizarCaptura" style="display:none">Finalizar captura</button>
		</div>
	</div>
</div>

<div class="container" vista="productos" style="display:none">
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-lg btn-block btn-success" showVista="carrito">Regresar</button>
		</div>
		<div class="col-xs-12 col-sm-3">
			<button class="btn btn-lg btn-block btn-warning" data-toggle="modal" data-target="#winFiltros">Filtro</button>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-xs-12">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
				<input type="text" class="form-control" placeholder="Filtro de productos" id="txtFiltro" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<span class="text-muted indicadorFiltro"></span>
		</div>
	</div>
	<hr />
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/cotizador/panelProductos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>


<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/cotizador/winDescripcionProducto.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/cotizador/winPedidos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/cotizador/winFiltrosAvanzados.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>