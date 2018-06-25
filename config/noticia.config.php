<?php
global $conf;

$conf['noticias'] = array(
	'controlador' => 'items.php',
	'vista' => 'noticias/panel.tpl',
	'descripcion' => 'Noticias',
	'seguridad' => true,
	'js' => array('item.class.js', 'noticia.class.js'),
	'perfiles' => array(1),
	'jsTemplate' => array('noticias.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listanoticias'] = array(
	'controlador' => 'items.php',
	'vista' => 'noticias/lista.tpl',
	'descripcion' => 'Lista de noticias',
	'perfiles' => array(1),
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>