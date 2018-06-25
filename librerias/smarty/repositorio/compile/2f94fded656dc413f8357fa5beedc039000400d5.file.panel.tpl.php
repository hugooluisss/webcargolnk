<?php /* Smarty version Smarty-3.1.11, created on 2018-01-30 13:25:20
         compiled from "templates/plantillas/modulos/pedidos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:674903885a58dddcbb10b3-22173385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f94fded656dc413f8357fa5beedc039000400d5' => 
    array (
      0 => 'templates/plantillas/modulos/pedidos/panel.tpl',
      1 => 1517336109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '674903885a58dddcbb10b3-22173385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5a58dddcbe8f00_91783183',
  'variables' => 
  array (
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a58dddcbe8f00_91783183')) {function content_5a58dddcbe8f00_91783183($_smarty_tpl) {?><div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Pedidos</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="txtFolio" class="col-sm-2 control-label">Folio</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFolio" name="txtFolio" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtFolio" class="col-sm-2 control-label">Fecha</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFecha" name="txtFecha" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtCliente" class="col-sm-2 control-label">Cliente</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtCliente" name="txtCliente" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtCorreo" class="col-sm-2 control-label">Correo</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtCorreo" name="txtCorreo" disabled="true" readonly="true" />
						</div>
					</div>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()!=3){?>
				<div class="box-footer clearfix">
					<div class="pull-right">
						<button class="btn btn-warning" changeEstado="3"><i class="fa fa-check" aria-hidden="true"></i> Aprobar pedido</button>
					</div>
				</div>
				<?php }?>
			</div>
		</form>
		<?php if ($_smarty_tpl->tpl_vars['PAGE']->value['usuario']->getPerfil()!=3){?>
		<div class="row">
			<div class="col-xs-12">
				<button class="btn btn-primary" data-toggle="modal" data-target="#winCatalogoProductos">Agregar producto</button>
			</div>
		</div>
		<?php }?>
		<br />
		<div id="dvProductos"></div>
	</div>
</div>
<input type="hidden" id="id" name="id" />
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/pedidos/winProductos.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/pedidos/winDetalleProducto.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/pedidos/winFacturar.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/pedidos/winEnvio.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>