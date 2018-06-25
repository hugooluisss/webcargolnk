<?php
global $conf;

$conf['appmovil'] = array(
	'vista' => 'appmovil/panel.tpl',
	'descripcion' => 'Configuración de la app',
	'controlador' => 'appmovil.php',
	'seguridad' => true,
	'perfiles' => array(1),
	'jsTemplate' => array('appmovil.js'),
	'capa' => LAYOUT_DEFECTO);

$conf['cappmovil'] = array(
	'controlador' => 'appmovil.php',
	'descripcion' => 'Controlador de configuración de la app',
	'seguridad' => true,
	'perfiles' => array(1),
	'capa' => LAYOUT_JSON);
	
$conf['cnotificaciones'] = array(
	'controlador' => 'notificaciones.php',
	'descripcion' => 'Controlador de notificaciones',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>