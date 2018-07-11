<div class="modal modal-limpia" tabindex="-1" role="dialog" id="winRegistraCarga">
	<form id="frmRegistraCarga" onsubmit="javascript: return false;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="text-center col-md-6 offset-md-3">
						<img src="{$PAGE.iconos}logo.png" class="img-fluid" />
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h3>¿Necesitas mover una carga?</h3>
					<p>Registra los datos de la carga, uno de nuestros transportistas postulará si se encuentra disponible</p>
					<div class="row">
						<div class="col-md-6">
							<input id="txtCorreo" name="txtCorreo" class="form-control" placeholder="Correo electrónico" type="email" />
						</div>
						<div class="col-md-6">
							<input id="txtTelefono" name="txtTelefono" class="form-control" placeholder="Teléfono" type="tel" />
						</div>
					</div>
					<div class="row">
						<div class="input-group col-md-6">
							<input id="txtOrigen" name="txtOrigen" class="form-control" placeholder="Origen" readonly="true" data-text="#txtOrigen" data-toggle="modal" data-target="#winMapa"/>
							<div class="input-group-append">
								<span class="input-group-text" id="btnOrigen" data-text="#txtOrigen" data-toggle="modal" data-target="#winMapa">
									<i class="fas fa-search"></i>
								</span>
							</div>
						</div>
						<div class="input-group col-md-6">
							<input id="txtDestino" name="txtDestino" class="form-control" placeholder="Destino" readonly="true" data-text="#txtDestino" data-toggle="modal" data-target="#winMapa"/>
							<div class="input-group-append">
								<span class="input-group-text" data-text="#txtDestino" data-toggle="modal" data-target="#winMapa">
									<i class="fas fa-search"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<input id="txtFechaServicio" name="txtFechaServicio" class="form-control" placeholder="Agenda de carga"/>
						</div>
						<div class="col-md-6">
							<input id="txtPeso" name="txtPeso" class="form-control" placeholder="Peso (ton)"/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<select id="selCamion" name="selCamion" class="form-control">
								<option value="">Tipo de camión</option>
								{foreach key=key item=item from=$tipoCamion}
									<option value="{$item.idTipoCamion}">{$item.descripcion}
								{/foreach}
							</select>
						</div>
						<div class="col-md-6">
							<input id="txtTarifa" name="txtTarifa" class="form-control" placeholder="Tarifa" />
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<textarea id="txtDescripcion" name="txtDescripcion" placeholder="Detalle de la carga" class="form-control" rows="5"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</form>
</div>