<?php /* Smarty version Smarty-3.1.11, created on 2018-03-22 12:13:09
         compiled from "templates/plantillas/modulos/secciones/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15924920835ab3f235cc22a0-95452493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a19a5e4ee5e3a2fa507342732bc5e2de62e720c6' => 
    array (
      0 => 'templates/plantillas/modulos/secciones/lista.tpl',
      1 => 1521742279,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15924920835ab3f235cc22a0-95452493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5ab3f235d73261_10079305',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab3f235d73261_10079305')) {function content_5ab3f235d73261_10079305($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Título</th>
					<th>Modificado</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['idSeccion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['titulo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['modificada'];?>
</td>
						<td style="color: <?php if ($_smarty_tpl->tpl_vars['row']->value['publicada']==1){?>blue<?php }else{ ?>red<?php }?>" class="text-center">
							<i class="fa fa-circle"></i>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-pencil"></i></button>
								<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idSeccion'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>