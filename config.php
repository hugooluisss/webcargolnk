<?php
define('VERSION', 'v 1.0');
define('ALIAS', $ini['sistema']['acronimoEmpresa']);
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');
define('LAYOUT_JSON', 'layout/json.tpl');
define('LAYOUT_SIGIN', 'layout/sign-in.tpl');

#Login y su controlador
$conf['inicio'] = array(
	'vista' => 'login/panel.tpl',
	'titulo' => 'Inicia sesión',
	'descripcion' => 'Inicia sesión',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => LAYOUT_SIGIN);

$conf['logout'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_AJAX);
	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
	
$conf['route'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Determina hacia donde mandar a los usuarios una vez que se inicia sesión',
	'seguridad' => true);
	
$conf['home'] = array(
	#'controlador' => 'index.php',
	'vista' => 'inicio.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'perfiles' => array(1, 3),
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);	

includeDir("config/");
?>