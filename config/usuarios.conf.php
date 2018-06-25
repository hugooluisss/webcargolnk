<?php
global $conf;

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'perfiles' => array(1),
	'js' => array('usuario.class.js', 'suscripcion.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'perfiles' => array(1),
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'perfiles' => array(1, 2),
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
	
$conf['registro'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/registro.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('registro.js'),
	'capa' => LAYOUT_TOPNAV);
	
$conf['activarCuenta'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/activarCuenta.tpl',
	'descripcion' => 'Activar cuenta de usuario',
	'seguridad' => true,
	'perfiles' => array(2),
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('activarCuenta.js'),
	'capa' => LAYOUT_TOPNAV);
?>