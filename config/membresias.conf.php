<?php
global $conf;

$conf['membresias'] = array(
	'controlador' => 'membresias.php',
	'vista' => 'membresias/panel.tpl',
	'descripcion' => 'Membresias',
	'seguridad' => true,
	'js' => array('membresia.class.js'),
	'jsTemplate' => array('membresias.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaMembresias'] = array(
	'controlador' => 'membresias.php',
	'vista' => 'membresias/lista.tpl',
	'descripcion' => 'Lista de membresias',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cmembresias'] = array(
	'controlador' => 'membresias.php',
	'descripcion' => 'Controlador de membresias',
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
?>