<?php
global $conf;

$conf['home'] = array(
	'vista' => 'home/panel.tpl',
	'titulo' => "Panelprincipal",
	'seguridad' => true,
	#'js' => array('usuario.class.js'),
	'jsTemplate' => array('home.js'),
	'capa' => LAYOUT_BACKEND);
?>