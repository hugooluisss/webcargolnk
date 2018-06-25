<?php
global $conf;

$conf['puestos'] = array(
	'vista' => 'puestos/panel.tpl',
	'descripcion' => 'Puestos',
	'seguridad' => true,
	'js' => array('puesto.class.js'),
	'perfiles' => array(1),
	'jsTemplate' => array('puestos.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listapuestos'] = array(
	'controlador' => 'puestos.php',
	'vista' => 'puestos/lista.tpl',
	'descripcion' => 'Lista de puestos',
	'perfiles' => array(1),
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cpuestos'] = array(
	'controlador' => 'puestos.php',
	'descripcion' => 'Controlador de puestos',
	'perfiles' => array(1),
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>