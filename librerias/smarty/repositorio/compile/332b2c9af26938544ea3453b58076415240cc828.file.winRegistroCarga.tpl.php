<?php /* Smarty version Smarty-3.1.11, created on 2018-06-26 13:20:42
         compiled from "templates/plantillas/modulos/frontend/winRegistroCarga.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10857213895b328275e34429-45765645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '332b2c9af26938544ea3453b58076415240cc828' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/winRegistroCarga.tpl',
      1 => 1530037240,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10857213895b328275e34429-45765645',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b328275e36726_65530583',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b328275e36726_65530583')) {function content_5b328275e36726_65530583($_smarty_tpl) {?><div class="modal" tabindex="-1" role="dialog" id="winRegistraCarga">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3>¿Necesitas mover una carga?</h3>
				<p>Registra los datos de la carga, uno de nuestros transportistas postulará si se encuentra disponible</p>
				
				<form id="frmRegistraCarga">
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
							<input id="txtOrigen" name="txtOrigen" class="form-control" placeholder="Origen"/>
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">
									<i class="fa fa-search" aria-hidden="true"></i>
								</span>
							</div>
						</div>
						<div class="col-md-6">
							<input id="txtDestino" name="txtDestino" class="form-control" placeholder="Destino"/>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div><?php }} ?>