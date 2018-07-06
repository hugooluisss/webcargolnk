<?php
global $conf;

$conf['transportistas'] = array(
	'controlador' => 'transportistas.php',
	'vista' => 'transportistas/panel.tpl',
	'descripcion' => 'Administración de transportistas',
	'seguridad' => true,
	'js' => array('transportista.class.js'),
	'jsTemplate' => array('transportistas.js'),
	'capa' => LAYOUT_BACKEND);

$conf['listatransportistas'] = array(
	'controlador' => 'transportistas.php',
	'vista' => 'transportistas/lista.tpl',
	'descripcion' => 'Lista de transportistas',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ctransportistas'] = array(
	'controlador' => 'transportistas.php',
	'descripcion' => 'Controlador de transportistas',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>