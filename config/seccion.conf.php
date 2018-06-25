<?php
global $conf;

$conf['secciones'] = array(
	'vista' => 'secciones/panel.tpl',
	'descripcion' => 'secciones',
	'seguridad' => true,
	'perfiles' => array(1),
	'js' => array('seccion.class.js'),
	'jsTemplate' => array('secciones.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listasecciones'] = array(
	'controlador' => 'secciones.php',
	'vista' => 'secciones/lista.tpl',
	'descripcion' => 'Lista de secciones',
	'seguridad' => true,
	'perfiles' => array(1),
	'capa' => LAYOUT_AJAX);

$conf['csecciones'] = array(
	'controlador' => 'secciones.php',
	'descripcion' => 'Controlador de secciones',
	'seguridad' => true,
	'perfiles' => array(1),
	'capa' => LAYOUT_JSON);
?>