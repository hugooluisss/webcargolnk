<?php /* Smarty version Smarty-3.1.11, created on 2018-01-23 13:42:57
         compiled from "templates/plantillas/modulos/cotizador/listaPedidos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5756524205a58eca93bc365-76074427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ee72d3338cf6021a58f8bbd29eb016bb0698a44' => 
    array (
      0 => 'templates/plantillas/modulos/cotizador/listaPedidos.tpl',
      1 => 1516219379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5756524205a58eca93bc365-76074427',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58eca9470436_86485285',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58eca9470436_86485285')) {function content_5a58eca9470436_86485285($_smarty_tpl) {?><table id="tblPedidos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Fecha</th>
			<th>Estado</th>
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
				<td style="border-left: 3px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['idPedido'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
</td>
				<td style="text-align: right">
					<a class="btn btn-primary btn-xs" href="?mod=ccotizador&action=imprimir&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['idPedido'];?>
" target="_blank" title="Imprimir"><i class="fa fa-file-pdf-o"></i></a>
					<?php if ($_smarty_tpl->tpl_vars['row']->value['idEstado']==1){?>
					<button type="button" class="btn btn-primary btn-xs" action="cargarPedido" title="Cargar pedido" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-hand-o-up"></i></button>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['row']->value['idEstado']==3){?>
					<button type="button" class="btn btn-primary btn-xs" action="subirComprobante" title="Subir comprobante de pago" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-money" aria-hidden="true"></i></button>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['row']->value['idEstado']==5){?>
					<a class="btn btn-success btn-xs" href="repositorio/factura/factura<?php echo $_smarty_tpl->tpl_vars['row']->value['idPedido'];?>
.zip" download="factura.zip"><i class="fa fa-download" aria-hidden="true"></i></a>
					<?php }?>

				</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>