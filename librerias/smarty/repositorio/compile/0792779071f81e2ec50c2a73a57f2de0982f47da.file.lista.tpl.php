<?php /* Smarty version Smarty-3.1.11, created on 2018-07-06 11:10:28
         compiled from "templates/plantillas/modulos/usuarios/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9237483075a87154fa33d51-27733704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0792779071f81e2ec50c2a73a57f2de0982f47da' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/lista.tpl',
      1 => 1530893426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9237483075a87154fa33d51-27733704',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a87154faacd01_65157903',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'modulo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a87154faacd01_65157903')) {function content_5a87154faacd01_65157903($_smarty_tpl) {?><table id="tblUsuarios" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Correo</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr title="<?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
">
				<?php if ($_smarty_tpl->tpl_vars['modulo']->value=='usuariostransportista'){?>
					<td style="border-left: 3px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
				<?php }else{ ?>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
				<?php }?>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-primary btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-edit"></i></button>
					<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" usuario="<?php echo $_smarty_tpl->tpl_vars['row']->value['idUsuario'];?>
"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>