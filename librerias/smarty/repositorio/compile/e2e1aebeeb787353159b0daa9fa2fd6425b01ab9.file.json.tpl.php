<?php /* Smarty version Smarty-3.1.11, created on 2018-01-12 09:00:26
         compiled from "templates/plantillas/layout/json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19260404775a58cd8ab820d8-05240902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e1aebeeb787353159b0daa9fa2fd6425b01ab9' => 
    array (
      0 => 'templates/plantillas/layout/json.tpl',
      1 => 1515686162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19260404775a58cd8ab820d8-05240902',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58cd8abfea19_71662532',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58cd8abfea19_71662532')) {function content_5a58cd8abfea19_71662532($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['json']->value!=''){?>
<?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>

<?php }?><?php }} ?>