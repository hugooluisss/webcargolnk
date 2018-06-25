<?php
global $conf;

$conf['cotizador'] = array(
	'controlador' => 'cotizador.php',
	'vista' => 'cotizador/panel.tpl',
	'titulo' => "Cotizador",
	'seguridad' => true,
	'perfiles' => array(2, 3),
	'js' => array('usuario.class.js', 'pedido.class.js', 'movimiento.class.js'),
	'jsTemplate' => array('cotizador.js'),
	'capa' => LAYOUT_TOPNAV);
	
$conf['listaPedidosCotizador'] = array(
	'controlador' => 'cotizador.php',
	'vista' => 'cotizador/listaPedidos.tpl',
	'descripcion' => 'Lista de Peidos',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['listaProductosPedido'] = array(
	'controlador' => 'cotizador.php',
	'vista' => 'cotizador/listaProductos.tpl',
	'descripcion' => 'Lista de productos de la cotización',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['ccotizador'] = array(
	'controlador' => 'cotizador.php',
	'descripcion' => 'Controlador de cotizaciones',
	'perfiles' => array(1, 2, 3),
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
?>