<?php /* Smarty version Smarty-3.1.11, created on 2018-01-12 10:02:21
         compiled from "templates/plantillas/modulos/productos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11054679985a58dba0002d68-33368169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cccdd047db745f66593d92cdbd37eb8bb7dd6ad' => 
    array (
      0 => 'templates/plantillas/modulos/productos/lista.tpl',
      1 => 1515772937,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11054679985a58dba0002d68-33368169',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58dba00cb700_81596641',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58dba00cb700_81596641')) {function content_5a58dba00cb700_81596641($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Código</th>
					<th>Descripción</th>
					<th>Marca</th>
					<th>Tipo</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['marca'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['tipo'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" item="<?php echo $_smarty_tpl->tpl_vars['row']->value['idProducto'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>