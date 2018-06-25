<?php /* Smarty version Smarty-3.1.11, created on 2018-01-26 08:52:13
         compiled from "templates/plantillas/modulos/usuarios/winEfectivo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17263440785a6a3790240941-56048134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8de101c59ea45b1ff5848ec65d1aaac4a1e4df3' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/winEfectivo.tpl',
      1 => 1516978332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17263440785a6a3790240941-56048134',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a6a3790243822_60807635',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a6a3790243822_60807635')) {function content_5a6a3790243822_60807635($_smarty_tpl) {?><div class="modal fade" id="winEfectivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Paga ahora tu membresía <span campo="titulo"></span> </h3>
			</div>
			<div class="modal-body">
				<h4>$ <span campo="precio"></span></h4>
				<small>La aprobación del pago puede tardar hasta 24 horas</small>
				<br />
				<br />
				<p>Sube tu comprobante de pago</p>
				<form id="upload" method="post" action="?mod=csuscripciones&action=uploadfile" enctype="multipart/form-data">
					<input type="hidden" name="membresia" id="membresia" value="" campo="idMembresia"/>
					<input type="file" name="upl" accept="image/jpg,image/jpeg"/>
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>