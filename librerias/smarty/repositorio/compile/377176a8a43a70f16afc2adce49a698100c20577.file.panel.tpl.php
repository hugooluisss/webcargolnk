<?php /* Smarty version Smarty-3.1.11, created on 2018-03-22 13:30:50
         compiled from "templates/plantillas/modulos/appmovil/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3666767225ab3f4f0a78fc3-90997337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '377176a8a43a70f16afc2adce49a698100c20577' => 
    array (
      0 => 'templates/plantillas/modulos/appmovil/panel.tpl',
      1 => 1521746759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3666767225ab3f4f0a78fc3-90997337',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5ab3f4f0b318a8_73857446',
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
    'secciones' => 0,
    'seccion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab3f4f0b318a8_73857446')) {function content_5ab3f4f0b318a8_73857446($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Configuración de la app</h1>
	</div>
</div>

<div id="listas" class="panel">
	<div id="dvLista" class="panel-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Código</th>
					<th>Publicacion</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td>
						<td>
							<select clave="<?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
" class="form-control setSeccion">
								<?php  $_smarty_tpl->tpl_vars["seccion"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["seccion"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['secciones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["seccion"]->key => $_smarty_tpl->tpl_vars["seccion"]->value){
$_smarty_tpl->tpl_vars["seccion"]->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['seccion']->value['idSeccion'];?>
" <?php if ($_smarty_tpl->tpl_vars['seccion']->value['idSeccion']==$_smarty_tpl->tpl_vars['row']->value['idSeccion']){?>selected="true"<?php }?>><?php echo $_smarty_tpl->tpl_vars['seccion']->value['titulo'];?>
</option>
								<?php } ?>
							</select>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>