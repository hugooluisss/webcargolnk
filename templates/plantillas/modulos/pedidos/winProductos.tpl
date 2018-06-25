<div class="modal fade" id="winCatalogoProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Productos</h3>
			</div>
			<div class="modal-body">				
				<table id="tblInventario" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Código</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						{foreach from=$productos item="row"}
							<tr>
								<td>{$row.codigo}</td>
								<td>{$row.descripcion}</td>
								<td class="precio">{$row.precio1}</td>
								<td style="text-align: right">
									<button type="button" class="btn btn-success btn-xs" action="selectProducto" title="Seleccionar" datos='{$row.json}' data-toggle="modal" data-target="#winDetalleProducto"><i class="fa fa-hand-o-up"></i></button>
								</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>