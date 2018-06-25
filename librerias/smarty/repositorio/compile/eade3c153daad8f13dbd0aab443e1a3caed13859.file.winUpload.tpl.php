<?php /* Smarty version Smarty-3.1.11, created on 2018-03-14 22:11:53
         compiled from "templates/plantillas/modulos/archivos/winUpload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18139258965aa9eec4173609-08284274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eade3c153daad8f13dbd0aab443e1a3caed13859' => 
    array (
      0 => 'templates/plantillas/modulos/archivos/winUpload.tpl',
      1 => 1521087061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18139258965aa9eec4173609-08284274',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5aa9eec41803e5_79949897',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa9eec41803e5_79949897')) {function content_5aa9eec41803e5_79949897($_smarty_tpl) {?><div class="modal fade" id="winUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Subir archivo</h4>
			</div>
			<div class="modal-body">
				<form id="frmUpload" method="post" action="?mod=citems&action=uploadArchivo" enctype="multipart/form-data">
					<input type="file" name="upl"/>
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>