<?php
global $conf;

$conf['panelprincipal'] = array(
	'vista' => 'home/panel.tpl',
	'titulo' => "Panelprincipal",
	'seguridad' => true,
	#'js' => array('usuario.class.js'),
	'jsTemplate' => array('home.js'),
	'capa' => LAYOUT_DEFECTO);
?>