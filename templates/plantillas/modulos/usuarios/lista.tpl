<div class="box">
	<div class="box-body" style="width: 100%; overflow: auto">
		<table id="tblUsuarios" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Perfil</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idUsuario}</td>
						<td>{$row.nombre}</td>
						<td>{$row.tipo}</td>
						<td style="text-align: right">
							{if $row.idPerfil eq 2}
								<button type="button" class="btn btn-primary btn-xs" action="suscripciones" title="Suscripciones" datos='{$row.json}' data-toggle="modal" data-target="#winSuscripciones"><i class="fa fa-star"></i></button>
							{/if}
							<button type="button" class="btn btn-primary btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" usuario="{$row.idUsuario}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>