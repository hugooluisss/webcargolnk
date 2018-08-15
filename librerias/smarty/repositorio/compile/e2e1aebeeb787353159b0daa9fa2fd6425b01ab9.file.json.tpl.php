<?php /* Smarty version Smarty-3.1.11, created on 2018-08-14 22:24:55
         compiled from "templates/plantillas/layout/json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4464395965b739d07bc64d8-76349941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '4464395965b739d07bc64d8-76349941',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b739d07ec1632_46730915',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b739d07ec1632_46730915')) {function content_5b739d07ec1632_46730915($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['json']->value!=''){?>
<?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>

<?php }?><?php }} ?>