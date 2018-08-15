<?php /* Smarty version Smarty-3.1.11, created on 2018-08-14 22:16:02
         compiled from "templates/plantillas/modulos/frontend/listaPostulantes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7896020995b739af2002187-15977016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f11fbb0b8ddc9b8f24c555b0791dc31755d2ab33' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/listaPostulantes.tpl',
      1 => 1531964647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7896020995b739af2002187-15977016',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'orden' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b739af223c822_14781746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b739af223c822_14781746')) {function content_5b739af223c822_14781746($_smarty_tpl) {?><table id="tblPostulantes" class="table table-red" style="width: 100%;">
	<thead>
		<tr>
			<th>Transportista</th>
			<th>Tarifa</th>
			<th>Contacto</th>
			<th>Calificacion</th>
			<th>Asignar</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['razonsocial'];?>
</td>
				<td>$ <?php echo $_smarty_tpl->tpl_vars['row']->value['monto'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['representante'];?>
</td>
				<td>
					<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int)ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['row']->value['calificacion']+1 - (1) : 1-($_smarty_tpl->tpl_vars['row']->value['calificacion'])+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0){
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++){
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
						<i class="far fa-2x fa-star"></i>
					<?php }} ?>
				</td>
				<?php if ($_smarty_tpl->tpl_vars['orden']->value->transportista->getId()==''){?>
					<td class="text-center">
						<button type="button" class="btn btn-link" action="asignar" title="Asignar orden a transportista" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="far fa-2x fa-hand-paper"></i></button>
					</td>
				<?php }else{ ?>
					<td class="text-center">
						<?php if ($_smarty_tpl->tpl_vars['orden']->value->transportista->getId()==$_smarty_tpl->tpl_vars['row']->value['idTransportista']){?>
							<i class="fas fa-2x fa-check text-success" aria-hidden="true"></i>
							
							<button type="button" class="btn btn-link" action="desasignar" title="Quitar asignación" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fas fa-2x fa-times"></i></button>
						<?php }?>
					</td>
				<?php }?>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>