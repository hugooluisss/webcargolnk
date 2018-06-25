<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<h1 class="page-header">Activa y confirma tu cuenta</h1>
	</div>
</div>

<div class="row" panel="solicitar">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<div class="box">
			<div class="box-body">
				Muchas gracias por realizar el registro, te solicitamos que confirmes tu número de celular, al cual se te enviará un código de activación
				
				<div class="form-group has-feedback">
					<select class="form-control" id="selPais" name="selPais">
						{foreach from=$paises item="row" key="key"}
							<option value="{$row}">{$key}</option>
						{/foreach}
					</select>
				</div>
				<div class="form-group has-feedback">
					<div class="input-group">
						<span class="input-group-addon" id="code"></span>
						<input type="tel" class="form-control" placeholder="Teléfono" id="txtTelefono" name="txtTelefono" value="{$PAGE.usuario->getTelefono()}">
						<span class="glyphicon glyphicon-phone form-control-feedback"></span>
					</div>
					
				</div>
			</div>
			<div class="box-footer">
				<button class="btn btn-primary btn-block" id="btnSolicitarCodigo">Solicitar código</button>
			</div>
		</div>
	</div>
</div>


<div class="row" panel="activar">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<div class="box">
			<div class="box-body">
				<p><b>¿Tienes el código?</b> Escribelo para activar tu cuenta</p>
				
				<input type="text" class="form-control" placeholder="Código" id="txtCodigo" name="txtCodigo" value="000000">
			</div>
			<div class="box-footer">
				<button class="btn btn-success btn-block" id="btnEnviarCodigo">Enviar código para activar</button>
			</div>
		</div>
	</div>
</div>