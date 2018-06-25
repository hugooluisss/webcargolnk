<div class="container" vista="carrito">
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
					<input type="hidden" id="url" value="{$ini.sistema.url}"/>
					
					<form method="post" action="https://www.paypal.com/cgi-bin/webscr" id="formPaypal">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="add" value="1">
						<input type="hidden" name="business" value="{$ini.paypal.email}">
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
	{include file=$PAGE.rutaModulos|cat:"modulos/cotizador/panelProductos.tpl"}
</div>


{include file=$PAGE.rutaModulos|cat:"modulos/cotizador/winDescripcionProducto.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/cotizador/winPedidos.tpl"}

{include file=$PAGE.rutaModulos|cat:"modulos/cotizador/winFiltrosAvanzados.tpl"}