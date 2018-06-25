<?php /* Smarty version Smarty-3.1.11, created on 2018-01-26 08:57:34
         compiled from "templates/plantillas/modulos/usuarios/membresias.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14999622765a66a2203a6801-98202254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41ac6b32e59984519a22ff10ed760ef8c88ff3be' => 
    array (
      0 => 'templates/plantillas/modulos/usuarios/membresias.tpl',
      1 => 1516978361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14999622765a66a2203a6801-98202254',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a66a220561321_85371396',
  'variables' => 
  array (
    'membresias' => 0,
    'row' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a66a220561321_85371396')) {function content_5a66a220561321_85371396($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Adquiere tu membresia</h1>
	</div>
</div>

<div class="row">
	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['membresias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class="box box-danger">
				<div class="box-heading">
					<div class="col-xs-12">
						<h2 class="text-danger"> <?php echo $_smarty_tpl->tpl_vars['row']->value['titulo'];?>
 <i class="fa fa-star" aria-hidden="true"></i></h2>
						<br />
						<b> MX $ <?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</b>
						<small class="text-muted"> Precio mensual</small>
						<br />
						<br />
					</div>
				</div>
				<div class="box-body">
					<div class="col-xs-12">
						<p>
						<?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>

						</p>
					</div>
				</div>
				<div class="box-footer text-right">
					<?php if ($_smarty_tpl->tpl_vars['row']->value['precio']==0){?>
						<a href="#" class="btn btn-success gratis" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'> <i class="fa fa-check" aria-hidden="true"></i>
 Gratis</a>
					<?php }else{ ?>
						<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#winPaypal" title="Pagar por paypal" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-paypal" aria-hidden="true"></i></a>
						
						<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#winEfectivo" title="Pagar en efectivo" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-money" aria-hidden="true"></i></a>
					<?php }?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/usuarios/winPaypal.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/usuarios/winEfectivo.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>