<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title>{$PAGE.empresaAcronimo}</title>
		<link rel="stylesheet" href="{$PAGE.ruta}dist/bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="{$PAGE.ruta}dist/css/ionicons.min.css">
		
		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/style.less" />
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	</head>
	<body layout="home">
		<div class="navbar navbar-fixed-top">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Inicio</a></li>
				<li><a href="#">Transportistas</a></li>
				<li><a href="#">Necesito mover mi carga</a></li>
				<li><a href="#">Login</a></li>
				<li><a href="#" class="btn btn-danger">Registra tu carga</a></li>
				<li><a href="#" class="btn btn-danger">Sigue tu carga</a></li>
			</ul>
		</div>
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
	</body>
</html>