<center>
	<img style="max-width: 400px;" src="{$PAGE.ruta}img/logo.png" />
	<br />
	<h3>Registro de clientes</h3>
</center>

<br />
<br />

<div class="row">
	<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
		<form role="form" id="frmRegistro" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="form-group">
				<label for="txtNombre" class="col-md-4 control-label">Nombre completo</label>
				<div class="col-md-8">
					<input class="form-control" id="txtNombre" name="txtNombre" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtCorreo" class="col-md-4 control-label">Correo electrónico</label>
				<div class="col-md-8">
					<input class="form-control" id="txtCorreo" name="txtCorreo" type="email" />
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="selPais" class="col-md-4 control-label">País</label>
				<div class="col-md-8">
					<select class="form-control" id="selPais" name="selPais">
						{foreach from=$paises item="row" key="key"}
							<option value="{$row}">{$key}</option>
						{/foreach}
					</select>
				</div>
			</div>
			<div class="form-group has-feedback">
				<label for="txtTelefono" class="col-md-4 control-label">Teléfono celular</label>
				<div class="col-md-8">
					<div class="input-group">
						<span class="input-group-addon" id="code"></span>
						<input type="tel" class="form-control" placeholder="Teléfono" id="txtTelefono" name="txtTelefono" type="tel">
						<span class="glyphicon glyphicon-phone form-control-feedback"></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="txtPass" class="col-md-4 control-label">Contraseña</label>
				<div class="col-md-8">
					<input class="form-control" id="txtPass" name="txtPass" type="password" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtPass" class="col-md-4 control-label">Confirma</label>
				<div class="col-md-8">
					<input class="form-control" id="txtPass2" name="txtPass2" type="password" />
				</div>
			</div>
			<div class="form-group">
				<label for="txtDireccion" class="col-md-4 control-label">Dirección</label>
				<div class="col-md-8">
					<textarea id="txtDireccion" name="txtDireccion" class="form-control" rows="4" placeholder="Esta dirección será utilizada para los envíos"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-12 text-right">
						<a href="index.php" class="btn btn-link">Iniciar sesión</a>
						<button type="submit" class="btn btn-primary">Registrarme</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>