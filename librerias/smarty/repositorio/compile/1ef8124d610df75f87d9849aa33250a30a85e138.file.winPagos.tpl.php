<?php /* Smarty version Smarty-3.1.11, created on 2018-01-25 13:45:21
         compiled from "templates/plantillas/modulos/usuarios/winPagos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8594495425a6a2842632b26-97880164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ef8124d610df75f87d9849aa33250a30a85e138' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/winPagos.tpl',
      1 => 1516909489,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8594495425a6a2842632b26-97880164',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6a284268b1e6_96918442',
  'variables' => 
  array (
    'ini' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6a284268b1e6_96918442')) {function content_5a6a284268b1e6_96918442($_smarty_tpl) {?><form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
	<div class="modal fade" id="winPaypal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Paga ahora <span campo="titulo"></span> </h3>
				</div>
				<div class="modal-body">
					<p>Reliza el pago en este momento y empieza a disfrutar de nuestros servicios</p>
					<small>El pago por Paypal incluye un 6% de comisión</small>
									
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="add" value="1">
					<input type="hidden" name="business" value="<?php echo $_smarty_tpl->tpl_vars['ini']->value['paypal']['email'];?>
">
					<input type="hidden" name="item_name" campo="titulo" value="Membresia">
					<input type="hidden" name="item_number" campo="idMembresia" value="">
					<input type="hidden" name="amount" campo="precio" value="">
					<input type="hidden" name="shipping" value="0">
					<input type="hidden" name="shipping2" value="0">
					<input type="hidden" name="handling" value="0 ">
					<input type="hidden" name="currency_code" value="MXN">
					<input type="hidden" name="undefined_quantity" value="1">
					<input type="hidden" name="return" campo="retorno"/>
				</div>
				<div class="modal-footer">
					<button type="submit" name="submit" class="btn btn-primary btn-block">Adquirir ahora <i class="fa fa-paypal" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
</form>
<input type="hidden" id="url" value="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['url'];?>
" />
<input type="hidden" id="usuario" value="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getId();?>
" /><?php }} ?>