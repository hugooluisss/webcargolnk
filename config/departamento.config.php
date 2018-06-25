<?php
global $conf;

$conf['departamentos'] = array(
	'vista' => 'departamentos/panel.tpl',
	'descripcion' => 'departamentos',
	'seguridad' => true,
	'perfiles' => array(1),
	'js' => array('departamento.class.js'),
	'jsTemplate' => array('departamentos.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listadepartamentos'] = array(
	'controlador' => 'departamentos.php',
	'vista' => 'departamentos/lista.tpl',
	'descripcion' => 'Lista de departamentos',
	'seguridad' => true,
	'perfiles' => array(1),
	'capa' => LAYOUT_AJAX);

$conf['cdepartamentos'] = array(
	'controlador' => 'departamentos.php',
	'descripcion' => 'Controlador de departamentos',
	'seguridad' => true,
	'perfiles' => array(1),
	'capa' => LAYOUT_JSON);
	
$conf['contactos'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
?>