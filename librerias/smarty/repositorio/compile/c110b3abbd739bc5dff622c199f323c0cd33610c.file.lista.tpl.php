<?php /* Smarty version Smarty-3.1.11, created on 2018-06-21 11:06:13
         compiled from "templates/plantillas/modulos/departamentos/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2142496015a871d512e92a7-93112360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c110b3abbd739bc5dff622c199f323c0cd33610c' => 
    array (
      0 => 'templates/plantillas/modulos/departamentos/lista.tpl',
      1 => 1529596992,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2142496015a871d512e92a7-93112360',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a871d51377095_50897334',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'aleatorio' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a871d51377095_50897334')) {function content_5a871d51377095_50897334($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Ícono</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars['aleatorio'] = new Smarty_variable(mt_rand(10,1000), null, 0);?>
					<tr>
						<td style="border-left: 3px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color1'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td class="text-center" style="background: <?php echo $_smarty_tpl->tpl_vars['row']->value['color1'];?>
">
							<?php if ($_smarty_tpl->tpl_vars['row']->value['icono']!=''){?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['row']->value['icono'];?>
?<?php echo $_smarty_tpl->tpl_vars['aleatorio']->value;?>
" style="width: 25px; height: 25px" />
							<?php }?>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-xs" action="uploadPortada" title="Subir imagen de portada" identificador='<?php echo $_smarty_tpl->tpl_vars['row']->value['idDepartamento'];?>
'><i class="fa fa-picture-o"></i></button>
							
							<button type="button" class="btn btn-primary btn-xs" action="uploadIcono" title="Subir ícono" identificador='<?php echo $_smarty_tpl->tpl_vars['row']->value['idDepartamento'];?>
'><i class="fa fa-upload"></i></button>
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" identificador='<?php echo $_smarty_tpl->tpl_vars['row']->value['idDepartamento'];?>
'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['idDepartamento'];?>
"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>