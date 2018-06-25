<?php
global $conf;
	
$conf['listaSuscripciones'] = array(
	'controlador' => 'suscripciones.php',
	'vista' => 'suscripciones/lista.tpl',
	'descripcion' => 'Lista de suscripciones',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['csuscripciones'] = array(
	'controlador' => 'suscripciones.php',
	'descripcion' => 'Controlador de suscripciones',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
$conf['membresia'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/membresias.tpl',
	'descripcion' => 'Pago de membresias',
	'seguridad' => true,
	'perfiles' => array(2),
	'js' => array('usuario.class.js', 'suscripcion.class.js'),
	'jsTemplate' => array('compraMembresias.js'),
	'capa' => LAYOUT_TOPNAV);
?>