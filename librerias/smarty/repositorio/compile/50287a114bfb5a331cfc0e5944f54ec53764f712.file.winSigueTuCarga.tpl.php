<?php /* Smarty version Smarty-3.1.11, created on 2018-07-11 12:21:58
         compiled from "templates/plantillas/modulos/frontend/winSigueTuCarga.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13604088025b463cb6acf2b3-41414149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50287a114bfb5a331cfc0e5944f54ec53764f712' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/winSigueTuCarga.tpl',
      1 => 1530206891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13604088025b463cb6acf2b3-41414149',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b463cb6b1c379_96957115',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b463cb6b1c379_96957115')) {function content_5b463cb6b1c379_96957115($_smarty_tpl) {?><div class="modal modal-limpia" tabindex="-1" role="dialog" id="winSigueTuCarga">
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
				<h3>Sigue tu carga en tiempo real</h3>
				<p>Ingresa el código de carga asignado en el momento de registrarla</p>
				
				<form id="frmSigueCarga">
					<div class="row">
						<div class="col-6 offset-3">
							<input id="txtCodigo" name="txtCodigo" class="form-control" placeholder="Código de carga" type="text" />
							<br />
							<button type="button" class="btn btn-danger btn-block">Consultar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div><?php }} ?>