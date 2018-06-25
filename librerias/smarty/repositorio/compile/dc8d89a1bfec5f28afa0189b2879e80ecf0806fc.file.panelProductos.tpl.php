<?php /* Smarty version Smarty-3.1.11, created on 2018-01-29 23:35:28
         compiled from "templates/plantillas/modulos/cotizador/panelProductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12935700155a58ec77876eb6-49325551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc8d89a1bfec5f28afa0189b2879e80ecf0806fc' => 
    array (
      0 => 'templates/plantillas/modulos/cotizador/panelProductos.tpl',
      1 => 1517290525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12935700155a58ec77876eb6-49325551',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58ec778cb732_82867908',
  'variables' => 
  array (
    'productos' => 0,
    'row' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58ec778cb732_82867908')) {function content_5a58ec778cb732_82867908($_smarty_tpl) {?><div class="row">
	<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 producto" style="cursor: pointer; height: 400px;" busqueda="<?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['descripcionlarga'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['marca'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['tipo'];?>
" marca="<?php echo str_replace(" ","_",$_smarty_tpl->tpl_vars['row']->value['marca']);?>
" tipo="<?php echo str_replace(" ","_",$_smarty_tpl->tpl_vars['row']->value['tipo']);?>
" data-toggle="modal" data-target="#winDescripcionProducto" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>
			<div class="panel panel-default">
				<div class="panel-body">
					<img src="<?php echo $_smarty_tpl->tpl_vars['PAGE']->value['iconos'];?>
/producto.png" class="img-responsive"/>
					<br />
					<div class="text-center">
						<b><?php echo $_smarty_tpl->tpl_vars['row']->value['codigo'];?>
</b>
						<span style="font-size: 12px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</span>
						<br />
						<span style="font-size: 12px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['marca'];?>
, <?php echo $_smarty_tpl->tpl_vars['row']->value['tipo'];?>
, <?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['peso'])===null||$tmp==='' ? 0 : $tmp);?>
gr</span>
						<br />
						<span class="text-primary price">
							<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==1){?>
								$ <?php echo number_format($_smarty_tpl->tpl_vars['row']->value['precio1'],2,".",",");?>

							<?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==2){?>
								<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->suscripcion->membresia->getNoPrecio()==1){?>
									$ <?php echo number_format($_smarty_tpl->tpl_vars['row']->value['precio1'],2,".",",");?>

								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->suscripcion->membresia->getNoPrecio()==2){?>
									$ <?php echo number_format($_smarty_tpl->tpl_vars['row']->value['precio2'],2,".",",");?>

								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->suscripcion->membresia->getNoPrecio()==3){?>
									$ <?php echo number_format($_smarty_tpl->tpl_vars['row']->value['precio3'],2,".",",");?>

								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->suscripcion->membresia->getNoPrecio()==4){?>
									$ <?php echo number_format($_smarty_tpl->tpl_vars['row']->value['precio4'],2,".",",");?>

								<?php }?>
							<?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()==3){?>
								$ <?php echo number_format($_smarty_tpl->tpl_vars['row']->value['precio1'],2,".",",");?>

							<?php }?>
						</span>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div><?php }} ?>