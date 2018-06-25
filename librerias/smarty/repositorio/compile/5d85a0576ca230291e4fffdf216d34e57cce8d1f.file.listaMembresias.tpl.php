<?php /* Smarty version Smarty-3.1.11, created on 2018-01-24 21:49:07
         compiled from "templates/plantillas/modulos/usuarios/listaMembresias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8583473255a6953b3a05464-81190655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d85a0576ca230291e4fffdf216d34e57cce8d1f' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/listaMembresias.tpl',
      1 => 1516851946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8583473255a6953b3a05464-81190655',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'membresias' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6953b3a7bce4_70583799',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6953b3a7bce4_70583799')) {function content_5a6953b3a7bce4_70583799($_smarty_tpl) {?><table id="tblMembresias" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Titulo</th>
			<th>Caduca</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['membresias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['titulo'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fechalimite'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>