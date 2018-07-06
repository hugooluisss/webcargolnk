<?php
global $conf;

$conf['tipocamion'] = array(
	'controlador' => 'tipocamion.php',
	'vista' => 'tipocamion/panel.tpl',
	'descripcion' => 'Administración del catálogo de tipo de camiones',
	'seguridad' => true,
	'js' => array('tipocamion.class.js'),
	'jsTemplate' => array('tipocamion.js'),
	'capa' => LAYOUT_BACKEND);

$conf['listatipocamion'] = array(
	'controlador' => 'tipocamion.php',
	'vista' => 'tipocamion/lista.tpl',
	'descripcion' => 'Lista de tipocamion',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ctipocamion'] = array(
	'controlador' => 'tipocamion.php',
	'descripcion' => 'Controlador de tipocamion',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>