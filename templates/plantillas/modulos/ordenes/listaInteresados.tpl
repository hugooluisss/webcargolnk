<table id="tblDatosInteresados" class="table table-bordered table-hover" style="width: 100%;">
	<thead>
		<tr>
			<th>Desde</th>
			<th>Nombre</th>
			<th>Representante</th>
			<th>Email</th>
			<th>Celular</th>
			<th>Presupuesto</th>
			{if $orden->transportista->getId() eq ''}
				<th>Asignar</th>
			{else}
				<th>Asignado</th>
			{/if}
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.registro}</td>
				<td>{$row.razonsocial}</td>
				<td>{$row.representante}</td>
				<td>{$row.correo}</td>
				<td>{$row.telefono}</td>
				<td class="text-right">{$row.monto2}</td>
				{if $orden->transportista->getId() eq ''}
					<td class="text-center">
						<button type="button" style="background: #2A4F68; border: none" class="btn btn-success" action="asignar" title="Asignar orden a transportista" datos='{$row.json}'><i class="fas fa-handshake" aria-hidden="true"></i></button>
					</td>
				{else}
					<td class="text-center">
						{if $orden->transportista->getRazonSocial() eq $row.nombre}
							<i class="fa fa-check text-success" aria-hidden="true"></i>
						{/if}
					</td>
				{/if}
			</tr>
		{/foreach}
	</tbody>
</table>