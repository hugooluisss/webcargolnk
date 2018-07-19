<div class="modal modal-limpia" tabindex="-1" role="dialog" id="winSigueTuCarga">
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
				<h3>Sigue tu carga en tiempo real</h3>
				<p>Ingresa el código de carga asignado en el momento de registrarla</p>
				
				<form id="frmSigueCarga">
					<div class="row">
						<div class="col-6 offset-3">
							<input id="txtCodigo" name="txtCodigo" class="form-control" placeholder="Código de carga" type="text" />
							<br />
							<button type="submit" class="btn btn-danger btn-block">Consultar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>