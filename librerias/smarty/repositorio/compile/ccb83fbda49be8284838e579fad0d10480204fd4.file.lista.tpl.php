<?php /* Smarty version Smarty-3.1.11, created on 2018-07-11 09:31:47
         compiled from "templates/plantillas/modulos/ordenes/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9760378275b4614d36ee5c1-79143304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccb83fbda49be8284838e579fad0d10480204fd4' => 
    array (
      0 => 'templates/plantillas/modulos/ordenes/lista.tpl',
      1 => 1531319460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9760378275b4614d36ee5c1-79143304',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5b4614d37bdd03_89222501',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b4614d37bdd03_89222501')) {function content_5b4614d37bdd03_89222501($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Estado</th>
					<th>Origen</th>
					<th>Interesados</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td style="border-left: 2px solid <?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['folio'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['origen_json']->direccion;?>
</td>
						<td class="text-center">
							<button type="button" class="btn btn-warning btn-xs" action="interesados" title="Transportistas interesados" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' data-toggle="modal" data-target="#winInteresados"><?php echo $_smarty_tpl->tpl_vars['row']->value['interesados'];?>
 / <?php echo $_smarty_tpl->tpl_vars['row']->value['propuestas'];?>
</button>
						</td>
						<td class="text-right" style="width: 80px;">
							<button type="button" class="btn btn-success btn-xs" action="puntos" title="Puntos de entrega" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
' data-toggle="modal" data-target="#winIntermedios"><i class="fa fa-map-marker"></i></button>
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#winSeguimiento" action="mapa" title="Consultar transporte" datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'><i class="fa fa-map-o"></i></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>