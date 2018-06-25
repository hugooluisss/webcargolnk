<?php
global $conf;

$conf['paqueterias'] = array(
	'controlador' => 'paqueterias.php',
	'vista' => 'paqueterias/panel.tpl',
	'descripcion' => 'Paqueterias',
	'seguridad' => true,
	'js' => array('paqueteria.class.js'),
	'jsTemplate' => array('paqueterias.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaPaqueterias'] = array(
	'controlador' => 'paqueterias.php',
	'vista' => 'paqueterias/lista.tpl',
	'descripcion' => 'Lista de paqueterias para los pedidos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cpaqueterias'] = array(
	'controlador' => 'paqueterias.php',
	'descripcion' => 'Controlador de paqueterias',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>