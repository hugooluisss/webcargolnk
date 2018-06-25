<?php
global $conf;

$conf['cmovimientos'] = array(
	'controlador' => 'movimientos.php',
	'descripcion' => 'Controlador de movimientos',
	'perfiles' => array(1, 2),
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>