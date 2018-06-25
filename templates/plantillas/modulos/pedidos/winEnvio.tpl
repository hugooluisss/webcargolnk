<form role="form" id="frmEnvio" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winEnvio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Datos de envío del pedido <span campo="idPedido"></span></h3>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="selEnvio" class="col-md-4 control-label">Pedido</label>
						<div class="col-md-8">
							<select id="selPaqueteria" name="selPaqueteria" class="form-control">
								{foreach from=$paqueterias item="row"}
									<option value="{$row.idPaqueteria}">{$row.nombre}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtGuia" class="col-md-4 control-label">Guía</label>
						<div class="col-md-8">
							<input class="form-control" id="txtGuia" name="txtGuia"/>
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