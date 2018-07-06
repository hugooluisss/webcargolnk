<?php
define('VERSION', 'v 1.0');
define('ALIAS', $ini['sistema']['acronimoEmpresa']);
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_FRONTEND', 'layout/frontend.tpl');
define('LAYOUT_BACKEND', 'layout/backend.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');
define('LAYOUT_JSON', 'layout/json.tpl');

#Login y su controlador
$conf['inicio'] = array(
	'vista' => 'frontend/home.tpl',
	'titulo' => 'Bienvenido',
	'descripcion' => 'Bienvenido',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('home.js', 'login.js'),
	'capa' => LAYOUT_FRONTEND);

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

includeDir("config/");
?>