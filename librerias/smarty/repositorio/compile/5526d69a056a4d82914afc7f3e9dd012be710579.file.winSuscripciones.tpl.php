<?php /* Smarty version Smarty-3.1.11, created on 2018-01-25 12:16:11
         compiled from "templates/plantillas/modulos/usuarios/winSuscripciones.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10895282575a6a083e4e9fe9-73512663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5526d69a056a4d82914afc7f3e9dd012be710579' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/winSuscripciones.tpl',
      1 => 1516904170,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10895282575a6a083e4e9fe9-73512663',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6a083e4f3849_70808655',
  'variables' => 
  array (
    'membresias' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6a083e4f3849_70808655')) {function content_5a6a083e4f3849_70808655($_smarty_tpl) {?><div class="modal fade" id="winSuscripciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Suscripciones</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12 text-right">
						<button class="btn-primary btn" data-toggle="modal" data-target="#winAddSuscripciones">Add</button>
					</div>
				</div>
				<br />
				<br />
				<div id="dvListaSuscripciones"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>


<form role="form" id="frmAddSuscripcion" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winAddSuscripciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Suscripciones</h3>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="selMembresia" class="col-sm-3 control-label">Membresia</label>
						<div class="col-sm-4">
							<select id="selMembresia" name="selMembresia" class="form-control">
								<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['membresias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idMembresia'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['titulo'];?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtMetodoPago" class="col-sm-3 control-label">Método de pago</label>
						<div class="col-sm-4">
							<input type="text" id="txtMetodoPago" name="txtMetodoPago" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtReferencia" class="col-sm-3 control-label">Referencia</label>
						<div class="col-sm-4">
							<input type="text" id="txtReferencia" name="txtReferencia" class="form-control" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</form><?php }} ?>