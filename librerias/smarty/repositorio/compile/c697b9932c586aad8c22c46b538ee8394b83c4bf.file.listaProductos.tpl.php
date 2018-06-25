<?php /* Smarty version Smarty-3.1.11, created on 2018-01-29 23:12:41
         compiled from "templates/plantillas/modulos/cotizador/listaProductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2571184285a58e9d94fd292-26548136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c697b9932c586aad8c22c46b538ee8394b83c4bf' => 
    array (
      0 => 'templates/plantillas/modulos/cotizador/listaProductos.tpl',
      1 => 1517289156,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2571184285a58e9d94fd292-26548136',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58e9d95cd992_27274342',
  'variables' => 
  array (
    'PAGE' => 0,
    'pedido' => 0,
    'lista' => 0,
    'items' => 0,
    'row' => 0,
    'subtotal' => 0,
    'rowspan' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58e9d95cd992_27274342')) {function content_5a58e9d95cd992_27274342($_smarty_tpl) {?><div class="box">
	<div class="box-body" style="width: 100%; overflow: auto">
		<table id="tblListaProductos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==1){?>
						<?php if (in_array($_smarty_tpl->tpl_vars['pedido']->value->estado->getId(),array(1,2))){?>
							<?php $_smarty_tpl->tpl_vars["rowspan"] = new Smarty_variable(4, null, 0);?>
							<th style="width: 60px;">&nbsp;</th>
						<?php }else{ ?>
							<?php $_smarty_tpl->tpl_vars["rowspan"] = new Smarty_variable(3, null, 0);?>
						<?php }?>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==2){?>
						<?php if (in_array($_smarty_tpl->tpl_vars['pedido']->value->estado->getId(),array(1))){?>
							<?php $_smarty_tpl->tpl_vars["rowspan"] = new Smarty_variable(4, null, 0);?>
							<th style="width: 60px;">&nbsp;</th>
						<?php }else{ ?>
							<?php $_smarty_tpl->tpl_vars["rowspan"] = new Smarty_variable(3, null, 0);?>
						<?php }?>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==3){?>
						<?php $_smarty_tpl->tpl_vars["rowspan"] = new Smarty_variable(3, null, 0);?>
					<?php }?>
					
					<th>Clave</th>
					<th>Descripción</th>
					<th>P. U.</th>
					<th>Cantidad</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $_smarty_tpl->tpl_vars["subtotal"] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars["items"] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<?php $_smarty_tpl->tpl_vars["items"] = new Smarty_variable(($_smarty_tpl->tpl_vars['items']->value+$_smarty_tpl->tpl_vars['row']->value['cantidad']), null, 0);?>
						
						<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==1){?>
							<?php if (in_array($_smarty_tpl->tpl_vars['pedido']->value->estado->getId(),array(1,2))){?>
								<td>
									<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" idMovimiento="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMovimiento'];?>
"><i class="fa fa-times"></i></button>
								</td>
							<?php }?>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==2){?>
							<?php if (in_array($_smarty_tpl->tpl_vars['pedido']->value->estado->getId(),array(1))){?>
								<td>
									<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" idMovimiento="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMovimiento'];?>
"><i class="fa fa-times"></i></button>
								</td>
							<?php }?>
						<?php }?>
						
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
						<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==1){?>
							<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
							<td class="text-right">
								<?php if (in_array($_smarty_tpl->tpl_vars['pedido']->value->estado->getId(),array(1,2))){?>
									<button class="btn btn-primary btn-block changeCantidad" movimiento="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMovimiento'];?>
" cantidad="<?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</button>
								<?php }else{ ?>
									<?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>

								<?php }?>
							</td>
							<td class="text-right"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['cantidad']*$_smarty_tpl->tpl_vars['row']->value['precio']),2,".",",");?>
</td>
							<?php $_smarty_tpl->tpl_vars["subtotal"] = new Smarty_variable($_smarty_tpl->tpl_vars['subtotal']->value+($_smarty_tpl->tpl_vars['row']->value['cantidad']*$_smarty_tpl->tpl_vars['row']->value['precio']), null, 0);?>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==2){?>
							<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
							<td class="text-right">
								<?php if (in_array($_smarty_tpl->tpl_vars['pedido']->value->estado->getId(),array(1))){?>
									<button class="btn btn-primary btn-block changeCantidad" movimiento="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMovimiento'];?>
" cantidad="<?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>
</button>
								<?php }else{ ?>
									<?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>

								<?php }?>
							</td>
							<td class="text-right"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['cantidad']*$_smarty_tpl->tpl_vars['row']->value['precio']),2,".",",");?>
</td>
							<?php $_smarty_tpl->tpl_vars["subtotal"] = new Smarty_variable($_smarty_tpl->tpl_vars['subtotal']->value+($_smarty_tpl->tpl_vars['row']->value['cantidad']*$_smarty_tpl->tpl_vars['row']->value['precio']), null, 0);?>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==3){?>
							<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['precio1'];?>
</td>
							<td class="text-right">
								<?php echo $_smarty_tpl->tpl_vars['row']->value['cantidad'];?>

							</td>
							
							<td class="text-right"><?php echo number_format(($_smarty_tpl->tpl_vars['row']->value['cantidad']*$_smarty_tpl->tpl_vars['row']->value['precio1']),2,".",",");?>
</td>
							<?php $_smarty_tpl->tpl_vars["subtotal"] = new Smarty_variable($_smarty_tpl->tpl_vars['subtotal']->value+($_smarty_tpl->tpl_vars['row']->value['cantidad']*$_smarty_tpl->tpl_vars['row']->value['precio1']), null, 0);?>
						<?php }?>
					</tr>
					
					
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="<?php echo $_smarty_tpl->tpl_vars['rowspan']->value;?>
" class="text-right">Sumatoria</th>
					<th class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['items']->value,0,".",",");?>
</th>
					<th class="text-right"><?php echo number_format($_smarty_tpl->tpl_vars['subtotal']->value,2,".",",");?>
</th>
				</tr>
				<?php if (in_array($_smarty_tpl->tpl_vars['pedido']->value->estado->getId(),array(2,3))){?>
				<tr>
					<th colspan="<?php echo $_smarty_tpl->tpl_vars['rowspan']->value+1;?>
" class="text-right">Envío</th>
					<th class="text-right">
						<?php if (in_array($_smarty_tpl->tpl_vars['pedido']->value->estado->getId(),array(1,2,3))&&$_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()!=2){?>
						<input style="width: 100px" class="form-control text-right" envio subtotal="<?php echo $_smarty_tpl->tpl_vars['subtotal']->value;?>
" anterior="<?php echo $_smarty_tpl->tpl_vars['pedido']->value->getEnvio();?>
" value="<?php echo number_format($_smarty_tpl->tpl_vars['pedido']->value->getEnvio(),2,".",'');?>
" />
						<?php }else{ ?>
							<?php echo number_format($_smarty_tpl->tpl_vars['pedido']->value->getEnvio(),2,".",'');?>

						<?php }?>
					</th>
				</tr>
				
				<tr>
					<th colspan="<?php echo $_smarty_tpl->tpl_vars['rowspan']->value+1;?>
" class="text-right">Total</th>
					<th class="text-right" id="subtotal" valor="<?php echo ($_smarty_tpl->tpl_vars['pedido']->value->getEnvio()+$_smarty_tpl->tpl_vars['subtotal']->value);?>
"><?php echo number_format(($_smarty_tpl->tpl_vars['pedido']->value->getEnvio()+$_smarty_tpl->tpl_vars['subtotal']->value),2,".",",");?>
</th>
				</tr>
				<?php }?>
			</tfoot>
		</table>
	</div>
</div><?php }} ?>