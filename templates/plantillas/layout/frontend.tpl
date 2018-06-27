<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>{$PAGE.empresaAcronimo}</title>
		<link rel="stylesheet" href="{$PAGE.ruta}dist/bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/style.less" />
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/fontawesome/css/all.css" />
		
		<script src="https://maps.googleapis.com/maps/api/js?key={$PAGE.inisistema.maps.key}"></script>
	</head>
	<body layout="home">
		<nav class="navbar navbar-expand-md navbar-light justify-content-end">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="menuPrincipal">
				<div class="navbar-nav mr-auto">
					<a href="inicio" class="nav-item">Inicio</a>
					<a href="#" class="nav-item">Transportistas</a>
					<a href="#" class="nav-item">Necesito mover mi carga</a>
					<a href="#" class="nav-item">Login</a>
					<a href="#" class="nav-item btn btn-danger" data-toggle="modal" data-target="#winRegistraCarga">Registra tu carga</a>
					<a href="#" class="nav-item btn btn-danger">Sigue tu carga</a>
				</div>
			</div>
		</nav>
		<div id="modulo">
			{if $PAGE.vista neq ''}
				{include file=$PAGE.vista}
			{/if}
		</div>
		
		<script src="librerias/less.min.js" type="text/javascript"></script>
		
		 <!-- jQuery 2.1.4 -->
	    <script src="{$PAGE.ruta}dist/jquery/jQuery/jQuery-2.1.4.min.js"></script>
	    <!-- jQuery UI 1.11.4 -->
	    <script src="{$PAGE.ruta}dist/jquery/jQueryUI/jquery-ui.min.js"></script>
	    <link rel="stylesheet" href="{$PAGE.ruta}dist/jquery/jQueryUI/jquery-ui.css">
	    <!-- Bootstrap 3.3.5 -->
	    <script src="{$PAGE.ruta}dist/bootstrap/js/bootstrap.min.js"></script>
	    
	    {foreach from=$PAGE.scriptsJS item=script}
			<script type="text/javascript" src="{$script}?m={rand()}"></script>
		{/foreach}
	</body>
</html>