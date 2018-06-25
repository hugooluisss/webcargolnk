<div class="login-logo">
</div><!-- /.login-logo -->

<div class="login-box-body">
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6">
			<center><img src="{$PAGE.ruta}img/logo.png" class="img-responsive"/></center>
		</div>
	</div>
	<p class="login-box-msg">
		Identificate para iniciar sesión
	</p>
	<form action="#" id="frmLogin" method="post">
		<div class="form-group has-feedback">
			<input type="text" class="form-control" placeholder="Correo electrónico" id="txtUsuario" name="txtUsuario">
			<span class="glyphicon glyphicon-email form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="password" class="form-control" placeholder="Contraseña" id="txtPass" name="txtPass">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="row">
			<!-- /.col -->
			<div class="col-xs-4">
			</div>
			<div class="col-xs-offset-4 col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
			</div><!-- /.col -->
		</div>
	</form>		
</div><!-- /.login-box-body -->