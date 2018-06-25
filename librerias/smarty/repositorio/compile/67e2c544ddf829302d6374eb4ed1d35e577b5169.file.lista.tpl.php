<?php /* Smarty version Smarty-3.1.11, created on 2018-01-24 21:01:55
         compiled from "templates/plantillas/modulos/membresias/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4146589145a6947e455b2e5-03942430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67e2c544ddf829302d6374eb4ed1d35e577b5169' => 
    array (
      0 => 'templates/plantillas/modulos/membresias/lista.tpl',
      1 => 1516849306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4146589145a6947e455b2e5-03942430',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6947e47023f3_11633798',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6947e47023f3_11633798')) {function content_5a6947e47023f3_11633798($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Título</th>
					<th>Precio</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idMembresia'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['titulo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
								<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" item="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMembresia'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>