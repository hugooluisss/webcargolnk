<?php
global $conf;

$conf['archivos'] = array(
	'controlador' => 'items.php',
	'vista' => 'archivos/panel.tpl',
	'descripcion' => 'Noticias',
	'seguridad' => true,
	'js' => array('item.class.js', 'archivo.class.js'),
	'perfiles' => array(1),
	'jsTemplate' => array('archivos.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaarchivos'] = array(
	'controlador' => 'items.php',
	'vista' => 'archivos/lista.tpl',
	'descripcion' => 'Lista de archivos',
	'perfiles' => array(1),
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>