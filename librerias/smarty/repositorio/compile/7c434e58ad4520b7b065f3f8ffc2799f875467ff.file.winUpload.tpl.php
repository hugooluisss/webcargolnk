<?php /* Smarty version Smarty-3.1.11, created on 2018-03-17 09:12:14
         compiled from "templates/plantillas/modulos/departamentos/winUpload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6818437995aaaae4a22d4d6-72774632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c434e58ad4520b7b065f3f8ffc2799f875467ff' => 
    array (
      0 => 'templates/plantillas/modulos/departamentos/winUpload.tpl',
      1 => 1521299359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6818437995aaaae4a22d4d6-72774632',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5aaaae4a233cc3_12404467',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aaaae4a233cc3_12404467')) {function content_5aaaae4a233cc3_12404467($_smarty_tpl) {?><div class="modal fade" id="winUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Subir archivo imagen</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-info">
					<p>Se sugiere el uso de imágenes en formato png con resolución de 150px por 150px</p>
				</div>
				
				<form id="frmUpload" method="post" action="" enctype="multipart/form-data">
					<input type="file" name="upl" accept="image/png"/>
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>