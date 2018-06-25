<div class="modal fade" id="winSuscripciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Suscripciones</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 text-right">
						<button class="btn-primary btn" data-toggle="modal" data-target="#winAddSuscripciones">Add</button>
					</div>
				</div>
				<br />
				<br />
				<div id="dvListaSuscripciones"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>


<form role="form" id="frmAddSuscripcion" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winAddSuscripciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Suscripciones</h3>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="selMembresia" class="col-sm-3 control-label">Membresia</label>
						<div class="col-sm-4">
							<select id="selMembresia" name="selMembresia" class="form-control">
								{foreach from=$membresias item="row"}
									<option value="{$row.idMembresia}">{$row.titulo}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtMetodoPago" class="col-sm-3 control-label">Método de pago</label>
						<div class="col-sm-4">
							<input type="text" id="txtMetodoPago" name="txtMetodoPago" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtReferencia" class="col-sm-3 control-label">Referencia</label>
						<div class="col-sm-4">
							<input type="text" id="txtReferencia" name="txtReferencia" class="form-control" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</form>