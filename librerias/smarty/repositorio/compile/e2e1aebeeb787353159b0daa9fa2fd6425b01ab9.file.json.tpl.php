<?php /* Smarty version Smarty-3.1.11, created on 2018-04-18 13:18:07
         compiled from "templates/plantillas/layout/json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14566509485a87184f8176a2-01972468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '14566509485a87184f8176a2-01972468',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a87184f87d9d6_40697121',
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a87184f87d9d6_40697121')) {function content_5a87184f87d9d6_40697121($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['json']->value!=''){?>
<?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>

<?php }?><?php }} ?>