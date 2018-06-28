<?php /* Smarty version Smarty-3.1.11, created on 2018-06-28 12:23:40
         compiled from "templates/plantillas/modulos/frontend/winRegistroCarga.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10857213895b328275e34429-45765645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '332b2c9af26938544ea3453b58076415240cc828' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/winRegistroCarga.tpl',
      1 => 1530206619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10857213895b328275e34429-45765645',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b328275e36726_65530583',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b328275e36726_65530583')) {function content_5b328275e36726_65530583($_smarty_tpl) {?><div class="modal modal-limpia" tabindex="-1" role="dialog" id="winRegistraCarga">
	<form id="frmRegistraCarga">
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
							<input id="txtTelefono" name="txtTelefono" class="form-control" placeholder="Teléfono" type="tel" />
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
							<input id="txtFecha" name="txtFecha" class="form-control" placeholder="Agenda de carga"/>
						</div>
						<div class="col-md-6">
							<input id="txtPeso" name="txtPeso" class="form-control" placeholder="Peso (ton)"/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<select id="selCamion" name="selCamion" class="form-control">
								<option value="">Tipo de camión</option>
							</select>
						</div>
						<div class="col-md-6">
							<input id="txtTarifa" name="txtTarifa" class="form-control" placeholder="Tarifa" />
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<textarea id="selDetalle" name="selDetalle" placeholder="Detalle de la carga" class="form-control" rows="5"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Save changes</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div><?php }} ?>