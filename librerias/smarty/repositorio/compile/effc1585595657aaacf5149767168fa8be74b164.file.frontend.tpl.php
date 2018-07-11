<?php /* Smarty version Smarty-3.1.11, created on 2018-07-11 12:23:31
         compiled from "templates/plantillas/layout/frontend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15093986545b463cb6881860-50893981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'effc1585595657aaacf5149767168fa8be74b164' => 
    array (
      0 => 'templates/plantillas/layout/frontend.tpl',
      1 => 1531329810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15093986545b463cb6881860-50893981',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b463cb6964f77_85002897',
  'variables' => 
  array (
    'PAGE' => 0,
    'script' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b463cb6964f77_85002897')) {function content_5b463cb6964f77_85002897($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Tell the browser to be responsive to screen width -->
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<title><?php echo $_smarty_tpl->tpl_vars['PAGE']->value['empresaAcronimo'];?>
</title>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/bootstrap/css/bootstrap.min.css">
		
		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/style.less" />
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
plugins/fontawesome/css/all.css" />
		
		<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['inisistema']['maps']['key'];?>
"></script>
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
					<a href="#" class="nav-item" data-toggle="modal" data-target="#winLogin">Login</a>
					<a href="#" class="nav-item btn btn-danger" data-toggle="modal" data-target="#winRegistraCarga">Registra tu carga</a>
					<a href="#" class="nav-item btn btn-danger" data-toggle="modal" data-target="#winSigueTuCarga">Sigue tu carga</a>
				</div>
			</div>
		</nav>
		<div id="modulo">
			<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['vista']!=''){?>
				<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['PAGE']->value['vista'], $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php }?>
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/frontend/login.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
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