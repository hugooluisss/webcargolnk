<?php /* Smarty version Smarty-3.1.11, created on 2018-07-18 16:12:11
         compiled from "templates/plantillas/modulos/transportistas/winUpload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3306551845b4fad2b6ea370-36647828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ecaf25ba3f02a1a1f18e91e0f23722d890c7ea6' => 
    array (
      0 => 'templates/plantillas/modulos/transportistas/winUpload.tpl',
      1 => 1531754653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3306551845b4fad2b6ea370-36647828',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b4fad2b6f19f5_44784612',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4fad2b6f19f5_44784612')) {function content_5b4fad2b6f19f5_44784612($_smarty_tpl) {?><div id="winDocumentos" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Documentos</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-primary" role="alert"><i class="fa-spinner fa-pulse fa-3x fa-fw"></i>Subiendo archivo...</div>
				
				<form role="form" id="frmUpload" action="?mod=ctransportistas&action=upload" method="post" class="form-horizontal" onsubmit="javascript: return false;" enctype="multipart/form-data">
					<div class="input-group row">
						<label class="col-4" for="nombre">Cambiar nombre</label>
						<div class="col-8">
							<input id="nombre" name="nombre" class="form-control" />
						</div>
					</div>
					<div class="input-group row">
						<label class="col-4" for="upl">Archivo</label>
						<div class="col-8">
							<input type="file" name="upl" class="form-control" />
						</div>
					</div>
					
				</form>
				<hr />
				<ul class="list-group lista">
				</ul>
			</div>
		</div>
	</div>
</div><?php }} ?>