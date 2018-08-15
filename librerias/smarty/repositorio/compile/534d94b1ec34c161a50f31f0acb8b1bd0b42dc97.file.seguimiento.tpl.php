<?php /* Smarty version Smarty-3.1.11, created on 2018-08-14 22:22:28
         compiled from "templates/plantillas/modulos/frontend/seguimiento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17118835105b739aec77db70-28317484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '534d94b1ec34c161a50f31f0acb8b1bd0b42dc97' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/seguimiento.tpl',
      1 => 1534303346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17118835105b739aec77db70-28317484',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b739aec79ccc6_45529402',
  'variables' => 
  array (
    'datosOrden' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b739aec79ccc6_45529402')) {function content_5b739aec79ccc6_45529402($_smarty_tpl) {?><ul id="panelTabs" class="nav nav-pills nav-justified">
  <li class="nav-item">
  	<a class="nav-link active" role="tab" data-toggle="pill" href="#postulantes">Postulantes</a>
  </li>
  <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#seguimiento">Seguimiento</a></li>
  <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#reporte">Reporte</a></li>
</ul>

<div class="tab-content">
	<div id="postulantes" class="tab-pane container active">
	</div>
	<div id="seguimiento" class="tab-pane container">
	</div>
	<div id="reporte" class="tab-pane container">
	</div>
</div>
<input type="hidden" id="datosOrden" value='<?php echo $_smarty_tpl->tpl_vars['datosOrden']->value;?>
' />
<input type="hidden" id="orden" value="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['GET']['id'];?>
" /><?php }} ?>