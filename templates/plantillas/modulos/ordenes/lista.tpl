<div class="box">
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
				{foreach from=$lista item="row"}
					<tr>
						<td style="border-left: 2px solid {$row.color}">{$row.folio}</td>
						<td>{$row.nombre}</td>
						<td>{$row.origen_json->direccion}</td>
						<td class="text-center">
							<button type="button" class="btn btn-warning btn-xs" action="interesados" title="Transportistas interesados" datos='{$row.json}' data-toggle="modal" data-target="#winInteresados">{$row.interesados}</button>
						</td>
						<td class="text-right" style="width: 80px;">
							<button type="button" class="btn btn-success btn-xs" action="puntos" title="Puntos de entrega" datos='{$row.json}' data-toggle="modal" data-target="#winIntermedios"><i class="fas fa-map-marker"></i></button>
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='{$row.json}'"><i class="fas fa-edit"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>