<?php /* Smarty version Smarty-3.1.11, created on 2018-07-12 10:22:21
         compiled from "templates/plantillas/layout/json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:701361265b464aabac7d51-93062017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e1aebeeb787353159b0daa9fa2fd6425b01ab9' => 
    array (
      0 => 'templates/plantillas/layout/json.tpl',
      1 => 1524075485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '701361265b464aabac7d51-93062017',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b464aabb26a12_36511300',
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b464aabb26a12_36511300')) {function content_5b464aabb26a12_36511300($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['json']->value!=''){?>
<?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>

<?php }?><?php }} ?>