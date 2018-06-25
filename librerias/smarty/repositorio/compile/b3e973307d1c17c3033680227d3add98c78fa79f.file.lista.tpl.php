<?php /* Smarty version Smarty-3.1.11, created on 2018-03-13 22:15:58
         compiled from "templates/plantillas/modulos/eventos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15446124175aa8a0793e31a1-67974568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3e973307d1c17c3033680227d3add98c78fa79f' => 
    array (
      0 => 'templates/plantillas/modulos/eventos/lista.tpl',
      1 => 1521000953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15446124175aa8a0793e31a1-67974568',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5aa8a079547e76_22448043',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa8a079547e76_22448043')) {function content_5aa8a079547e76_22448043($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Título</th>
					<th>Fecha</th>
					<th>Lugar</th>
					<th>Publicada</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['lugar'];?>
</td>
						<td style="color: <?php if ($_smarty_tpl->tpl_vars['row']->value['publicado']==1){?>blue<?php }else{ ?>red<?php }?>" class="text-center">
							<i class="fa fa-circle"></i>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" identificador='<?php echo $_smarty_tpl->tpl_vars['row']->value['idItem'];?>
'><i class="fa fa-pencil"></i></button>
								<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idItem'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>