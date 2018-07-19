<table id="tblDatos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Razón social</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr title="{$row.estado}">
				<td style="border-left: 3px solid {if $row.aprobado eq 1}green{else}red{/if}">{$row.razonsocial}</td>
				<td>{$row.correo}</td>
				<td>{$row.telefono}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-primary btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-edit"></i></button>
					
					<button type="button" class="btn btn-success btn-xs" title="documentos" identificador="{$row.idTransportista}" data-toggle="modal" data-target="#winDocumentos"><i class="fa fa-file"></i></button>
					
					<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="{$row.idTransportista}"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>