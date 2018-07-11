<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <base href="{$PAGE.url}index.php" target="_top">
		<title>{$PAGE.empresaAcronimo}</title>
		<link rel="stylesheet" href="{$PAGE.ruta}dist/bootstrap/css/bootstrap.min.css">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


		<link rel="stylesheet/less" type="text/css" href="{$PAGE.ruta}build/style.less" />
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
		<link rel="stylesheet" href="{$PAGE.ruta}plugins/fontawesome/css/all.css" />
		
		<script src="https://maps.googleapis.com/maps/api/js?key={$PAGE.inisistema.maps.key}"></script>
	</head>
	<body layout="backend">
		<nav class="navbar navbar-expand-md justify-content-between fixed-top">
			<button class="navbar-toggler left" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i class="fas fa-bars"></i>
				</span>
			</button>
			<a class="navbar-brand" href="#">
				Menú principal
			</a>
			<div class="menuLateral navbar-collapse collapse" id="navbarTogglerDemo01">
				<ul class="sidebar-menu">
					<li class="header">MENÚ PRINCIPAL</li>
					<li><a href="usuarios" class="{if $PAGE.modulo eq 'usuarios'}activo{/if}"><i class="fas fa-3x fa-user"></i> Usuarios</a></li>
					<li><a href="tipocamion" class="{if $PAGE.modulo eq 'tipocamion'}activo{/if}"><i class="fas fa-3x fa-truck-loading"></i> Tipo camión</a></li>
					<li><a href="cargas" class="{if $PAGE.modulo eq 'cargas'}activo{/if}"><i class="fas fa-3x fa-truck-moving"></i> Cargas registradas</a></li>
					<li><a href="transportistas" class="{if $PAGE.modulo eq 'transportistas'}activo{/if}"><i class="fas fa-3x fa-users"></i> Catálogo transportistas</a></li>
					<li><a href="#"><i class="fas fa-3x fa-file-signature"></i> Reportes</a></li>
				</ul>
			</div>
			<ul class="navbar-nav">
				<li class="navbar-right"><a href="#"><i class="fas fa-user"></i> <span>{$PAGE.usuario->getNombre()}</span></a></li>
			</ul>
		</nav>
		<div id="modulo" class="container">
			<div class="row logotipo">
				<div class="col-xs-6 offset-6 text-right col-sm-4 offset-sm-8">
					<img src="{$PAGE.iconos}logo.png" class="img-fluid" /><br />
					<span>{$smarty.now|date_format:"%d"} de {$smarty.now|date_format:"%B"} del {$smarty.now|date_format:"%Y"}</span>
				</div>
			</div>
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
	    
	    <!-- Validate -->
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.es.js"></script>
	    <script type="text/javascript" src="{$PAGE.ruta}plugins/validate/validate.js"></script>
	    
	    <!-- Datatables -->
	    <script src="{$PAGE.ruta}plugins/DataTables/lenguaje/ES-mx.js"></script>
		<link rel="stylesheet" type="text/css" href="{$PAGE.ruta}plugins/DataTables/datatables.min.css"/>
		<script type="text/javascript" src="{$PAGE.ruta}plugins/DataTables/datatables.min.js"></script>
		
		<!-- Date time picker-->
		<link rel="stylesheet" type="text/css" href="{$PAGE.ruta}plugins/datetimepicker/jquery.datetimepicker.min.css"/>
		<script type="text/javascript" src="{$PAGE.ruta}plugins/datetimepicker/jquery.datetimepicker.full.min.js"></script>

	    {foreach from=$PAGE.scriptsJS item=script}
			<script type="text/javascript" src="{$script}?m={rand()}"></script>
		{/foreach}
	</body>
</html>