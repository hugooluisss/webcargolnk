<?php /* Smarty version Smarty-3.1.11, created on 2018-01-30 13:25:20
         compiled from "templates/plantillas/modulos/pedidos/winProductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14722954845a5bd76ce1aac6-74038914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5408ed56fe0fa8501c111c71ca60104dd58a4ff' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/winProductos.tpl',
      1 => 1517336109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14722954845a5bd76ce1aac6-74038914',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a5bd76ceae445_96214677',
  'variables' => 
  array (
    'productos' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5bd76ceae445_96214677')) {function content_5a5bd76ceae445_96214677($_smarty_tpl) {?><div class="modal fade" id="winCatalogoProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Productos</h3>
			</div>
			<div class="modal-body">				
				<table id="tblInventario" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Código</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
								<td class="precio"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio1'];?>
</td>
								<td style="text-align: right">
									<button type="button" class="btn btn-success btn-xs" action="selectProducto" title="Seleccionar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' data-toggle="modal" data-target="#winDetalleProducto"><i class="fa fa-hand-o-up"></i></button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>