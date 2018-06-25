<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Estado</th>
					<th>Usuario</th>
					<th>Departamento</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td style="border-left: 3px solid {if $row.estado eq 0}orange{else}blue{/if}">{$row.fecha}</td>
						<td style="color: {if $row.estado eq 0}orange{else}blue{/if}">{if $row.estado eq 0}Pendiente{else}Atendida{/if}</td>
						<td>{$row.usuario}</td>
						<td>{$row.departamento}</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>