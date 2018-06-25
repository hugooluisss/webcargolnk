<?php /* Smarty version Smarty-3.1.11, created on 2018-01-30 13:25:21
         compiled from "templates/plantillas/modulos/pedidos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4996881955a58ddfcb27f98-56982686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '475eddcdce8a2967b537a5b41d38f430be447673' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/lista.tpl',
      1 => 1517336109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4996881955a58ddfcb27f98-56982686',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58ddfcbf3782_00984815',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58ddfcbf3782_00984815')) {function content_5a58ddfcbf3782_00984815($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblPedidos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Cliente</th>
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
						<td style="border-left: 4px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['idPedido'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cliente'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['estado'];?>
</td>
						<td style="text-align: right">
							<a class="btn btn-primary btn-xs" href="?mod=ccotizador&action=imprimir&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['idPedido'];?>
" target="_blank" title="Imprimir"><i class="fa fa-file-pdf-o"></i></a>
							<?php if (in_array($_smarty_tpl->tpl_vars['row']->value['idEstado'],array(2,3))){?>
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['idEstado']==4){?>
								<button type="button" class="btn btn-success btn-xs" action="facturar" title="Facturar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-file-text"></i></button>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['row']->value['idEstado']==5){?>
								<button type="button" class="btn btn-success btn-xs" action="enviar" title="Envío" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-truck"></i></button>
							<?php }?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>