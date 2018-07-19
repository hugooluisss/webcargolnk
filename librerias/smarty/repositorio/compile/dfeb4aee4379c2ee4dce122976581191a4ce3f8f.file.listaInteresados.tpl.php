<?php /* Smarty version Smarty-3.1.11, created on 2018-07-17 16:28:07
         compiled from "templates/plantillas/modulos/ordenes/listaInteresados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6191066285b4e5d91363707-02443868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfeb4aee4379c2ee4dce122976581191a4ce3f8f' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/listaInteresados.tpl',
      1 => 1531862882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6191066285b4e5d91363707-02443868',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b4e5d91468010_03303254',
  'variables' => 
  array (
    'orden' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4e5d91468010_03303254')) {function content_5b4e5d91468010_03303254($_smarty_tpl) {?><table id="tblDatosInteresados" class="table table-bordered table-hover" style="width: 100%;">
	<thead>
		<tr>
			<th>Desde</th>
			<th>Nombre</th>
			<th>Representante</th>
			<th>Email</th>
			<th>Celular</th>
			<th>Presupuesto</th>
			<?php if ($_smarty_tpl->tpl_vars['orden']->value->transportista->getId()==''){?>
				<th>Asignar</th>
			<?php }else{ ?>
				<th>Asignado</th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['registro'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['representante'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['correo'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['telefono'];?>
</td>
				<td class="text-right"><?php echo $_smarty_tpl->tpl_vars['row']->value['monto2'];?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['orden']->value->transportista->getId()==''){?>
					<td class="text-center">
						<button type="button" style="background: #2A4F68; border: none" class="btn btn-success" action="asignar" title="Asignar orden a transportista" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fas fa-handshake" aria-hidden="true"></i></button>
					</td>
				<?php }else{ ?>
					<td class="text-center">
						<?php if ($_smarty_tpl->tpl_vars['orden']->value->transportista->getRazonSocial()==$_smarty_tpl->tpl_vars['row']->value['nombre']){?>
							<i class="fa fa-check text-success" aria-hidden="true"></i>
						<?php }?>
					</td>
				<?php }?>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>