<?php /* Smarty version Smarty-3.1.11, created on 2018-01-22 20:24:22
         compiled from "templates/plantillas/modulos/pedidos/winEnvio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9417530205a60c02f09cbc9-53075486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcee2f0ad314358d31959c6c173aaecca555987e' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/winEnvio.tpl',
      1 => 1516298667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9417530205a60c02f09cbc9-53075486',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a60c02f0d3ae4_75008288',
  'variables' => 
  array (
    'paqueterias' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a60c02f0d3ae4_75008288')) {function content_5a60c02f0d3ae4_75008288($_smarty_tpl) {?><form role="form" id="frmEnvio" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winEnvio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Datos de envío del pedido <span campo="idPedido"></span></h3>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="selEnvio" class="col-md-4 control-label">Pedido</label>
						<div class="col-md-8">
							<select id="selPaqueteria" name="selPaqueteria" class="form-control">
								<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paqueterias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idPaqueteria'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtGuia" class="col-md-4 control-label">Guía</label>
						<div class="col-md-8">
							<input class="form-control" id="txtGuia" name="txtGuia"/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Agregar</button>
				</div>
			</div>
		</div>
	</div>
</form><?php }} ?>