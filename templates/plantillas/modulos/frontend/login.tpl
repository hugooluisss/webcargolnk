<div class="modal modal-limpia" tabindex="-1" role="dialog" id="winLogin">
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
				<form id="frmLogin" action="#" id="frmLogin" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" id="txtUsuario" name="txtUsuario">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Contraseña" id="txtPass" name="txtPass">
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-12">
							<button type="submit" class="btn btn-danger btn-block">Iniciar</button>
						</div><!-- /.col -->
					</div>
				</form>
			</div>
		</div>
	</div>
</div>