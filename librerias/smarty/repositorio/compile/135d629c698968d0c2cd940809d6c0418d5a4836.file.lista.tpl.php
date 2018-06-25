<?php /* Smarty version Smarty-3.1.11, created on 2018-06-22 09:49:42
         compiled from "templates/plantillas/modulos/solicitudes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23871735b2bf30c08e082-86474796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '135d629c698968d0c2cd940809d6c0418d5a4836' => 
    array (
      0 => 'templates/plantillas/modulos/solicitudes/lista.tpl',
      1 => 1529678980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23871735b2bf30c08e082-86474796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b2bf30c18edc9_35700148',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b2bf30c18edc9_35700148')) {function content_5b2bf30c18edc9_35700148($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Estado</th>
					<th>Usuario</th>
					<th>Departamento</th>
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
						<td style="border-left: 3px solid <?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==0){?>orange<?php }else{ ?>blue<?php }?>"><?php echo $_smarty_tpl->tpl_vars['row']->value['fecha'];?>
</td>
						<td style="color: <?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==0){?>orange<?php }else{ ?>blue<?php }?>"><?php if ($_smarty_tpl->tpl_vars['row']->value['estado']==0){?>Pendiente<?php }else{ ?>Atendida<?php }?></td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['usuario'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['departamento'];?>
</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>