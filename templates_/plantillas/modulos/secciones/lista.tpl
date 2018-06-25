<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Título</th>
					<th>Modificado</th>
					<th>Publicada</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idSeccion}</td>
						<td>{$row.titulo}</td>
						<td>{$row.modificada}</td>
						<td style="color: {if $row.publicada eq 1}blue{else}red{/if}" class="text-center">
							<i class="fa fa-circle"></i>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
								<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="{$row.idSeccion}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>