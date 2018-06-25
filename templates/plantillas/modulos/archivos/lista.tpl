<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Título</th>
					<th>Registró</th>
					<th>Existe archivo</th>
					<th>Publicada</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.titulo}</td>
						<td>{$row.registro}</td>
						<td class="text-center">
							{if $row.existe neq ''}
								<a href="{$row.existe}" download="{$row.file}">{$row.file}</a>
							{/if}
						</td>
						<td style="color: {if $row.publicado eq 1}blue{else}red{/if}" class="text-center">
							<i class="fa fa-circle"></i>
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-xs" action="upload" title="Subir archivo" identificador='{$row.idItem}'><i class="fa fa-upload"></i></button>
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" identificador='{$row.idItem}'><i class="fa fa-pencil"></i></button>
								<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="{$row.idItem}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>