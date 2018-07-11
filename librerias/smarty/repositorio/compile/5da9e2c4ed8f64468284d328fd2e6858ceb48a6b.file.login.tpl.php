<?php /* Smarty version Smarty-3.1.11, created on 2018-07-11 12:21:58
         compiled from "templates/plantillas/modulos/frontend/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21018258855b463cb6b1fe54-72115048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5da9e2c4ed8f64468284d328fd2e6858ceb48a6b' => 
    array (
      0 => 'templates/plantillas/modulos/frontend/login.tpl',
      1 => 1530209141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21018258855b463cb6b1fe54-72115048',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b463cb6b59cc0_44068628',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b463cb6b59cc0_44068628')) {function content_5b463cb6b59cc0_44068628($_smarty_tpl) {?><div class="modal modal-limpia" tabindex="-1" role="dialog" id="winLogin">
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
				<form id="frmLogin" action="#" id="frmLogin" method="post">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Email" id="txtUsuario" name="txtUsuario">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Contraseña" id="txtPass" name="txtPass">
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-12">
							<button type="submit" class="btn btn-danger btn-block">Iniciar</button>
						</div><!-- /.col -->
					</div>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>