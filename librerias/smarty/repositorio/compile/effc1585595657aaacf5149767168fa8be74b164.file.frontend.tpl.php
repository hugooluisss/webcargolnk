<?php /* Smarty version Smarty-3.1.11, created on 2018-06-25 13:36:53
         compiled from "templates/plantillas/layout/frontend.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1252067815b3112cbebf748-01181086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'effc1585595657aaacf5149767168fa8be74b164' => 
    array (
      0 => 'templates/plantillas/layout/frontend.tpl',
      1 => 1529951796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1252067815b3112cbebf748-01181086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b3112cbee3499_27943285',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b3112cbee3499_27943285')) {function content_5b3112cbee3499_27943285($_smarty_tpl) {?><!DOCTYPE html>
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
		
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
dist/css/ionicons.min.css">
		
		<link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['ruta'];?>
build/style.less" />
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
	</body>
</html><?php }} ?>