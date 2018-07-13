<?php /* Smarty version Smarty-3.1.11, created on 2018-07-12 10:22:21
         compiled from "templates/plantillas/layout/backend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3250420035b463c6bb87359-78537734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb27fbafb15cd6741b5ed051c431f5031245501a' => 
    array (
      0 => 'templates/plantillas/layout/backend.tpl',
      1 => 1531346456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3250420035b463c6bb87359-78537734',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b463c6bc4fe60_70537613',
  'variables' => 
  array (
    'PAGE' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b463c6bc4fe60_70537613')) {function content_5b463c6bc4fe60_70537613($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Library/WebServer/Documents/cargolink-web/librerias/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <base href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['url'];?>
index.php" target="_top">
		<title><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['empresaAcronimo'];?>
</title>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/bootstrap/css/bootstrap.min.css">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/style.less" />
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/fontawesome/css/all.css" />
		
		<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['inisistema']['maps']['key'];?>
"></script>
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
					<li><a href="usuarios" class="<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='usuarios'){?>activo<?php }?>"><i class="fas fa-3x fa-user"></i> Usuarios</a></li>
					<li><a href="tipocamion" class="<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='tipocamion'){?>activo<?php }?>"><i class="fas fa-3x fa-truck-loading"></i> Tipo camión</a></li>
					<li><a href="cargas" class="<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='cargas'){?>activo<?php }?>"><i class="fas fa-3x fa-truck-moving"></i> Cargas registradas</a></li>
					<li><a href="transportistas" class="<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['modulo']=='transportistas'){?>activo<?php }?>"><i class="fas fa-3x fa-users"></i> Catálogo transportistas</a></li>
					<li><a href="#"><i class="fas fa-3x fa-file-signature"></i> Reportes</a></li>
				</ul>
			</div>
			<ul class="navbar-nav">
				<li class="navbar-right"><a href="#"><i class="fas fa-user"></i> <span><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getNombre();?>
</span></a></li>
			</ul>
		</nav>
		<div id="modulo" class="container">
			<div class="row logotipo">
				<div class="col-xs-6 offset-6 text-right col-sm-4 offset-sm-8">
					<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
logo.png" class="img-fluid" /><br />
					<span><?php echo smarty_modifier_date_format(time(),"%d");?>
 de <?php echo smarty_modifier_date_format(time(),"%B");?>
 del <?php echo smarty_modifier_date_format(time(),"%Y");?>
</span>
				</div>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['vista']!=''){?>
				<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['PAGE']->value['vista'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php }?>
		</div>
		
		<script src="librerias/less.min.js" type="text/javascript"></script>
		
		 <!-- jQuery 2.1.4 -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/jquery/jQuery/jQuery-2.1.4.min.js"></script>
	    <!-- jQuery UI 1.11.4 -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/jquery/jQueryUI/jquery-ui.min.js"></script>
	    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/jquery/jQueryUI/jquery-ui.css">
	    <!-- Bootstrap 3.3.5 -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/bootstrap/js/bootstrap.min.js"></script>
	    
	    <!-- Validate -->
	    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.es.js"></script>
	    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/validate/validate.js"></script>
	    
	    <!-- Datatables -->
	    <script src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/DataTables/lenguaje/ES-mx.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/DataTables/datatables.min.css"/>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/DataTables/datatables.min.js"></script>
		
		<!-- Date time picker-->
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datetimepicker/jquery.datetimepicker.min.css"/>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/datetimepicker/jquery.datetimepicker.full.min.js"></script>

	    <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['script']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PAGE']->value['scriptsJS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
$_smarty_tpl->tpl_vars['script']->_loop = true;
?>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['script']->value;?>
?m=<?php echo rand();?>
"></script>
		<?php } ?>
	</body>
</html><?php }} ?>