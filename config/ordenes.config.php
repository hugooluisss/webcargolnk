<?php
global $conf;

$conf['cargas'] = array(
	'controlador' => 'ordenes.php',
	'vista' => 'ordenes/panel.tpl',
	'descripcion' => 'Administración deordenes',
	'seguridad' => true,
	'js' => array('orden.class.js', 'transportista.class.js'),
	'jsTemplate' => array('ordenes.js'),
	'capa' => LAYOUT_BACKEND);

$conf['listaordenes'] = array(
	'controlador' => 'ordenes.php',
	'vista' => 'ordenes/lista.tpl',
	'descripcion' => 'Lista de ordenes',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaordenestransportistas'] = array(
	'controlador' => 'ordenes.php',
	'descripcion' => 'Lista de ordenes',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['listaordenestransportistaspostuladas'] = array(
	'controlador' => 'ordenes.php',
	'descripcion' => 'Lista de ordenes',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['cordenes'] = array(
	'controlador' => 'ordenes.php',
	'descripcion' => 'Controlador de ordenes',
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
	
$conf['listaInteresados'] = array(
	'controlador' => 'interesados.php',
	'vista' => 'ordenes/listaInteresados.tpl',
	'descripcion' => 'Lista de interesados',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>