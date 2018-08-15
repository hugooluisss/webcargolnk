<?php /* Smarty version Smarty-3.1.11, created on 2018-08-14 22:29:53
         compiled from "templates/plantillas/modulos/frontend/winRegistroCarga.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2829024965b739e31112dd3-40477376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '332b2c9af26938544ea3453b58076415240cc828' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/winRegistroCarga.tpl',
      1 => 1531407027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2829024965b739e31112dd3-40477376',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
    'tipoCamion' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b739e31141382_57894319',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b739e31141382_57894319')) {function content_5b739e31141382_57894319($_smarty_tpl) {?><div class="modal modal-limpia" tabindex="-1" role="dialog" id="winRegistraCarga">
	<form id="frmRegistraCarga" onsubmit="javascript: return false;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="text-center col-md-6 offset-md-3">
						<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
logo.png" class="img-fluid" />
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h3>¿Necesitas mover una carga?</h3>
					<p>Registra los datos de la carga, uno de nuestros transportistas postulará si se encuentra disponible</p>
					<div class="row">
						<div class="col-md-6">
							<input id="txtCorreo" name="txtCorreo" class="form-control" placeholder="Correo electrónico" type="email" />
						</div>
						<div class="col-md-6">
							<input id="txtTelefonoReg" name="txtTelefonoReg" class="form-control" placeholder="Teléfono" type="tel" />
						</div>
					</div>
					<div class="row">
						<div class="input-group col-md-6">
							<input id="txtOrigen" name="txtOrigen" class="form-control" placeholder="Origen" readonly="true" data-text="#txtOrigen" data-toggle="modal" data-target="#winMapa"/>
							<div class="input-group-append">
								<span class="input-group-text" id="btnOrigen" data-text="#txtOrigen" data-toggle="modal" data-target="#winMapa">
									<i class="fas fa-search"></i>
								</span>
							</div>
						</div>
						<div class="input-group col-md-6">
							<input id="txtDestino" name="txtDestino" class="form-control" placeholder="Destino" readonly="true" data-text="#txtDestino" data-toggle="modal" data-target="#winMapa"/>
							<div class="input-group-append">
								<span class="input-group-text" data-text="#txtDestino" data-toggle="modal" data-target="#winMapa">
									<i class="fas fa-search"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<input id="txtFechaServicio" name="txtFechaServicio" class="form-control" placeholder="Agenda de carga"/>
						</div>
						<div class="col-md-6">
							<input id="txtPeso" name="txtPeso" class="form-control" placeholder="Peso (ton)"/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<select id="selCamion" name="selCamion" class="form-control">
								<option value="">Tipo de camión</option>
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tipoCamion']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idTipoCamion'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>

								<?php } ?>
							</select>
						</div>
						<div class="col-md-6">
							<input id="txtTarifa" name="txtTarifa" class="form-control" placeholder="Tarifa" />
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<textarea id="txtDescripcion" name="txtDescripcion" placeholder="Detalle de la carga" class="form-control" rows="5"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</form>
</div><?php }} ?>