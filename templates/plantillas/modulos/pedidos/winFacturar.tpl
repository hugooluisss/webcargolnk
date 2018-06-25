<div class="modal fade" id="winFacturar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
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
				<div class="row">
					<div class="col-xs-12 col-sm-6 text-center">
						<textarea readonly="true" disabled="true" campo="comentario" class="form-control" rows="5"></textarea>
						<img src="" id="imgComprobante" class="img-responsive" onerror="javascript: this.src=''"/>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<label for="" class="col-md-4 control-label">Fecha</label>
							<div class="col-md-8">
								<input class="form-control" campo="fecha" disabled="true" readonly="true"/>
							</div>
						</div>
						<br />
						<div class="form-group">
							<label for="" class="col-md-4 control-label">Subtotal</label>
							<div class="col-md-8">
								<input class="form-control text-right" campo="subtotal" disabled="true" readonly="true"/>
							</div>
						</div>
						<br />
						<div class="form-group">
							<label for="" class="col-md-4 control-label">Envío</label>
							<div class="col-md-8">
								<input class="form-control text-right" campo="envio" disabled="true" readonly="true"/>
							</div>
						</div>
						<br />
						<div class="form-group">
							<label for="" class="col-md-4 control-label">Total</label>
							<div class="col-md-8">
								<input class="form-control text-right" campo="total" disabled="true" readonly="true"/>
							</div>
						</div>
						<br />
						<br />
						<br />
						<div class="panel panel-primary">
							<div class="panel-body">
								<p>
									<b>El cliente entregó el siguiente comprobante de pago, si todo está correcta sube la factura</b>
								</p>
								<form id="upload" method="post" action="?mod=ccotizador&action=uploadFactura" enctype="multipart/form-data">
									<input type="file" name="upl" accept="zip"/>
									<ul class="elementos list-group">
									<!-- The file list will be shown here -->
									</ul>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>