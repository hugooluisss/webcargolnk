<?php /* Smarty version Smarty-3.1.11, created on 2018-08-14 22:16:01
         compiled from "templates/plantillas/modulos/ordenes/reporte.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11496225825b739af1b59050-79012642%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e27b44214cd817794e281a8d60ae71801212906' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/reporte.tpl',
      1 => 1534302904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11496225825b739af1b59050-79012642',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fotos' => 0,
    'row' => 0,
    'comentarios' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b739af1ba7079_21192098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b739af1ba7079_21192098')) {function content_5b739af1ba7079_21192098($_smarty_tpl) {?><div class="row">
	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fotos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<div class="col-3 text-center">
			<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
" download="reporte.jpg" title="Click para descargar">
				<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value;?>
" style="max-height: 400px;" class="img-responsive" />
			</a>
		</div>
	<?php } ?>
</div>
<br />
<div class="row">
	<div class="col-12"><b>Comentario</b></div>
</div>
<div class="row">
	<div class="col-12"><?php echo $_smarty_tpl->tpl_vars['comentarios']->value;?>
</div>
</div><?php }} ?>