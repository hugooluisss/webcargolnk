<?php /* Smarty version Smarty-3.1.11, created on 2018-03-14 22:35:26
         compiled from "templates/plantillas/modulos/archivos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7762145525aa9e3ece309d5-03455587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98d21ad7afde94bd39a8931997b3ee01830a1ac6' => 
    array (
      0 => 'templates/plantillas/modulos/archivos/lista.tpl',
      1 => 1521088524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7762145525aa9e3ece309d5-03455587',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5aa9e3ecee8b44_21842486',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa9e3ecee8b44_21842486')) {function content_5aa9e3ecee8b44_21842486($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Título</th>
					<th>Registró</th>
					<th>Existe archivo</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['registro'];?>
</td>
						<td class="text-center">
							<?php if ($_smarty_tpl->tpl_vars['row']->value['existe']!=''){?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['existe'];?>
" download="<?php echo $_smarty_tpl->tpl_vars['row']->value['file'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['file'];?>
</a>
							<?php }?>
						</td>
						<td style="color: <?php if ($_smarty_tpl->tpl_vars['row']->value['publicado']==1){?>blue<?php }else{ ?>red<?php }?>" class="text-center">
							<i class="fa fa-circle"></i>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-xs" action="upload" title="Subir archivo" identificador='<?php echo $_smarty_tpl->tpl_vars['row']->value['idItem'];?>
'><i class="fa fa-upload"></i></button>
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