<?php
global $conf;

$conf['eventos'] = array(
	'controlador' => 'items.php',
	'vista' => 'eventos/panel.tpl',
	'descripcion' => 'Programación de eventos',
	'seguridad' => true,
	'js' => array('item.class.js', 'evento.class.js'),
	'perfiles' => array(1),
	'jsTemplate' => array('eventos.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaeventos'] = array(
	'controlador' => 'items.php',
	'vista' => 'eventos/lista.tpl',
	'descripcion' => 'Lista de eventos',
	'perfiles' => array(1),
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>