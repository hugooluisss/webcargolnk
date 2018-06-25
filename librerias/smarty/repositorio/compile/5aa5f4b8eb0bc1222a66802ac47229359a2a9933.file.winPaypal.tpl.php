<?php /* Smarty version Smarty-3.1.11, created on 2018-01-25 13:55:37
         compiled from "templates/plantillas/modulos/usuarios/winPaypal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16536771825a6a33feb175b4-73560927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5aa5f4b8eb0bc1222a66802ac47229359a2a9933' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/winPaypal.tpl',
      1 => 1516910063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16536771825a6a33feb175b4-73560927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6a33feb42e55_49135538',
  'variables' => 
  array (
    'ini' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6a33feb42e55_49135538')) {function content_5a6a33feb42e55_49135538($_smarty_tpl) {?><form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
	<div class="modal fade" id="winPaypal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Paga ahora tu membresía <span campo="titulo"></span> </h3>
				</div>
				<div class="modal-body">
					<p>Reliza el pago en este momento y empieza a disfrutar de nuestros servicios</p>
					<h4>$ <span campo="precio"></span> + 6% = $ <span campo="precioTotal" class="text-danger"></span></h4>
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