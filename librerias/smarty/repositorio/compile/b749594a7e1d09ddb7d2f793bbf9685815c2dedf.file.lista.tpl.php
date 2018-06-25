<?php /* Smarty version Smarty-3.1.11, created on 2018-01-25 12:36:33
         compiled from "templates/plantillas/modulos/suscripciones/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15067122915a6a08c3493530-60306511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b749594a7e1d09ddb7d2f793bbf9685815c2dedf' => 
    array (
      0 => 'templates/plantillas/modulos/suscripciones/lista.tpl',
      1 => 1516905390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15067122915a6a08c3493530-60306511',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6a08c359cce2_09035581',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6a08c359cce2_09035581')) {function content_5a6a08c359cce2_09035581($_smarty_tpl) {?><table id="tblSuscripciones" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Titulo</th>
			<th>Caduca</th>
			<th>Pagado en</th>
			<th>Referencia</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['titulo'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fechalimite'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['metodopago'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['referencia'];?>
</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idSuscripcion'];?>
"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>