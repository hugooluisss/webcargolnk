<?php
global $conf;

$conf['pedidos'] = array(
	'controlador' => 'pedido.php',
	'vista' => 'pedidos/panel.tpl',
	'descripcion' => 'Estado de los pedidos',
	'seguridad' => true,
	'js' => array('pedido.class.js', 'movimiento.class.js'),
	'jsTemplate' => array('pedidos.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaPedidos'] = array(
	'controlador' => 'pedido.php',
	'vista' => 'pedidos/lista.tpl',
	'descripcion' => 'Lista de pedidos para los pedidos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);

$conf['cpedidos'] = array(
	'controlador' => 'pedido.php',
	'descripcion' => 'Controlador de pedidos',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>