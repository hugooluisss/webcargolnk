<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Pedidos</h1>
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
						<label for="txtFolio" class="col-sm-2 control-label">Folio</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFolio" name="txtFolio" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtFolio" class="col-sm-2 control-label">Fecha</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFecha" name="txtFecha" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtCliente" class="col-sm-2 control-label">Cliente</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtCliente" name="txtCliente" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtCorreo" class="col-sm-2 control-label">Correo</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtCorreo" name="txtCorreo" disabled="true" readonly="true" />
						</div>
					</div>
				</div>
				{if $PAGE.usuario->getPerfil() neq 3}
				<div class="box-footer clearfix">
					<div class="pull-right">
						<button class="btn btn-warning" changeEstado="3"><i class="fa fa-check" aria-hidden="true"></i> Aprobar pedido</button>
					</div>
				</div>
				{/if}
			</div>
		</form>
		{if $PAGE.usuario->getPerfil() neq 3}
		<div class="row">
			<div class="col-xs-12">
				<button class="btn btn-primary" data-toggle="modal" data-target="#winCatalogoProductos">Agregar producto</button>
			</div>
		</div>
		{/if}
		<br />
		<div id="dvProductos"></div>
	</div>
</div>
<input type="hidden" id="id" name="id" />
{include file=$PAGE.rutaModulos|cat:"modulos/pedidos/winProductos.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/pedidos/winDetalleProducto.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/pedidos/winFacturar.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/pedidos/winEnvio.tpl"}