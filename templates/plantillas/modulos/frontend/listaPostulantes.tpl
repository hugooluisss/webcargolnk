<table id="tblPostulantes" class="table table-red" style="width: 100%;">
	<thead>
		<tr>
			<th>Transportista</th>
			<th>Tarifa</th>
			<th>Contacto</th>
			<th>Calificacion</th>
			<th>Asignar</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.razonsocial}</td>
				<td>$ {$row.monto}</td>
				<td>{$row.representante}</td>
				<td>
					{for $var=1 to $row.calificacion}
						<i class="far fa-2x fa-star"></i>
					{/for}
				</td>
				{if $orden->transportista->getId() eq ''}
					<td class="text-center">
						<button type="button" class="btn btn-link" action="asignar" title="Asignar orden a transportista" datos='{$row.json}'><i class="far fa-2x fa-hand-paper"></i></button>
					</td>
				{else}
					<td class="text-center">
						{if $orden->transportista->getId() eq $row.idTransportista}
							<i class="fas fa-2x fa-check text-success" aria-hidden="true"></i>
							
							<button type="button" class="btn btn-link" action="desasignar" title="Quitar asignación" datos='{$row.json}'><i class="fas fa-2x fa-times"></i></button>
						{/if}
					</td>
				{/if}
			</tr>
		{/foreach}
	</tbody>
</table>