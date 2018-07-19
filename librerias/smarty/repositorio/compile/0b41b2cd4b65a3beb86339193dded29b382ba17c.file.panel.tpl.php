<?php /* Smarty version Smarty-3.1.11, created on 2018-07-17 16:20:12
         compiled from "templates/plantillas/modulos/ordenes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11048089165b4e5d8cf0e334-14780163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b41b2cd4b65a3beb86339193dded29b382ba17c' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/panel.tpl',
      1 => 1531861650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11048089165b4e5d8cf0e334-14780163',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tipoCamion' => 0,
    'item' => 0,
    'estados' => 0,
    'orden' => 0,
    'PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b4e5d8d0543f5_13383468',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4e5d8d0543f5_13383468')) {function content_5b4e5d8d0543f5_13383468($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Cargas
		</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-pills">
  <li class="nav-item">
  	<a class="nav-link active" role="tab" data-toggle="pill" href="#listas">Lista</a>
  </li>
  <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane container active">
		<div id="dvLista">
		</div>
	</div>
	
	<div id="add" class="tab-pane container">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="card">
				<div class="card-body">
					<div class="form-group row">
						<label for="txtFolio" class="col-lg-2">Código</label>
						<div class="col-lg-4">
							<input type="text" id="txtFolio" name="txtFolio" class="form-control" placeholder="" disabled="true" readonly="true"/>
						</div>
					</div>
					<div class="form-group row">
						<label for="selTipo" class="col-lg-2">Tipo</label>
						<div class="col-lg-4">
							<select class="form-control" id="selTipoCamion" name="selTipoCamion">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tipoCamion']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idTipoCamion'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>

								<?php } ?>
							</select>
						</div>
						<label for="selEstado" class="col-lg-2">Estado</label>
						<div class="col-lg-4">
							<select class="form-control" id="selEstado" name="selEstado">
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['idEstado'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>

								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtCorreo" class="col-lg-2">Correo</label>
						<div class="col-lg-4">
							<input type="email" id="txtCorreo" name="txtCorreo" class="form-control" placeholder=""/>
						</div>
						<label for="txtTelefono" class="col-lg-2">Teléfono</label>
						<div class="col-lg-4">
							<input type="tel" id="txtTelefono" name="txtTelefono" class="form-control" placeholder=""/>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtDescripcion" class="col-lg-2">Descripción</label>
						<div class="col-lg-10">
							<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtFechaServicio" class="col-lg-2">Fecha cargo</label>
						<div class="col-lg-3">
							<input type="datetime" id="txtFechaServicio" name="txtFechaServicio" class="form-control" placeholder="Y-m-d H:i" readonly="true"/>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtPresupuesto" class="col-lg-2">Presupuesto disponible</label>
						<div class="col-lg-3">
							<input type="text" id="txtPresupuesto" name="txtPresupuesto" class="form-control text-right" />
						</div>
						<label for="txtPeso" class="col-lg-2">Peso</label>
						<div class="col-lg-3">
							<input type="text" id="txtPeso" name="txtPeso" class="form-control text-right" placeholder="Toneladas" />
						</div>
					</div>
					<div class="form-group row">
						<label for="txtOrigen" class="col-lg-2">Origen</label>
						<div class="col-lg-4">
							<textarea id="txtOrigen" rows="4" name="txtOrigen" class="form-control" readonly="true"></textarea>
						</div>
						<label for="txtOrigen" class="col-lg-2">Destino</label>
						<div class="col-lg-4">
							<textarea id="txtDestino" rows="4" name="txtDestino" class="form-control" readonly="true"></textarea>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="reset" id="btnReset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
					<input type="hidden" id="id" name="id" value=""/>
				</div>
			</div>
		</form>
	</div>
</div>

<input type="hidden" id="auxOrden" value="<?php echo $_smarty_tpl->tpl_vars['orden']->value;?>
"/>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ordenes/winMapa.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['PAGE']->value['rutaModulos']).("modulos/ordenes/winInteresados.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>