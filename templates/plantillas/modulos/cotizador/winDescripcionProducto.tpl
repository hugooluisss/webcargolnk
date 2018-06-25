<form role="form" id="frmAddProducto" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winDescripcionProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
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
							<input class="form-control text-right" campo="precio" disabled="true" readonly="true"/>
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
</form>