<?php
global $conf;

$conf['solicitudes'] = array(
	'vista' => 'solicitudes/panel.tpl',
	'descripcion' => 'solicitudes',
	'seguridad' => true,
	'perfiles' => array(1),
	'js' => array('solicitud.class.js'),
	'jsTemplate' => array('solicitudes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listasolicitudes'] = array(
	'controlador' => 'solicitudes.php',
	'vista' => 'solicitudes/lista.tpl',
	'descripcion' => 'Lista de solicitudes',
	'seguridad' => true,
	'perfiles' => array(1),
	'capa' => LAYOUT_AJAX);

$conf['csolicitudes'] = array(
	'controlador' => 'solicitudes.php',
	'descripcion' => 'Controlador de solicitudes',
	'seguridad' => true,
	'perfiles' => array(1),
	'capa' => LAYOUT_JSON);
?>