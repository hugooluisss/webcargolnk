<?php /* Smarty version Smarty-3.1.11, created on 2018-03-13 19:26:27
         compiled from "templates/plantillas/modulos/noticias/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7543063775aa75d67ea2076-68251626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef2da2ca06737301952f922759d109dba6eb0d6e' => 
    array (
      0 => 'templates/plantillas/modulos/noticias/lista.tpl',
      1 => 1520990553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7543063775aa75d67ea2076-68251626',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5aa75d680d13a2_32168734',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa75d680d13a2_32168734')) {function content_5aa75d680d13a2_32168734($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Título</th>
					<th>Actualizada</th>
					<th>Depto</th>
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
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['actualizada'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['departamento'];?>
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