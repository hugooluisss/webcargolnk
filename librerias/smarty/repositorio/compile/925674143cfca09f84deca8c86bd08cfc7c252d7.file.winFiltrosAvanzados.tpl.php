<?php /* Smarty version Smarty-3.1.11, created on 2018-01-23 15:04:07
         compiled from "templates/plantillas/modulos/cotizador/winFiltrosAvanzados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9661821965a6792faa65749-10993823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '925674143cfca09f84deca8c86bd08cfc7c252d7' => 
    array (
      0 => 'templates/plantillas/modulos/cotizador/winFiltrosAvanzados.tpl',
      1 => 1516741445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9661821965a6792faa65749-10993823',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6792faa9f082_08478897',
  'variables' => 
  array (
    'tipos' => 0,
    'iden' => 0,
    'marcas' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6792faa9f082_08478897')) {function content_5a6792faa9f082_08478897($_smarty_tpl) {?><div class="modal fade" id="winFiltros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Filtro</h3>
			</div>
			<div class="modal-body">				
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<b>Tipos</b>
						<select class="form-control" id="selTipos" multiple="true" style="height: 150px;">
							<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_smarty_tpl->tpl_vars["iden"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tipos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
 $_smarty_tpl->tpl_vars["iden"]->value = $_smarty_tpl->tpl_vars["row"]->key;
?>
								<option value="<?php echo str_replace(" ","_",$_smarty_tpl->tpl_vars['iden']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['iden']->value;?>
</option>
							<?php } ?>
						</select>
					</div>
					<div class="col-xs-12 col-sm-6">
						<b>Marcas</b>
						<select class="form-control" id="selMarcas" multiple="true" style="height: 150px;">
							<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_smarty_tpl->tpl_vars["iden"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['marcas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
 $_smarty_tpl->tpl_vars["iden"]->value = $_smarty_tpl->tpl_vars["row"]->key;
?>
								<option value="<?php echo str_replace(" ","_",$_smarty_tpl->tpl_vars['iden']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['iden']->value;?>
</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>