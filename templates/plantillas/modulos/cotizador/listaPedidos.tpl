<table id="tblPedidos" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Fecha</th>
			<th>Estado</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td style="border-left: 3px solid {$row.color}">{$row.idPedido}</td>
				<td>{$row.fecha}</td>
				<td>{$row.estado}</td>
				<td style="text-align: right">
					<a class="btn btn-primary btn-xs" href="?mod=ccotizador&action=imprimir&id={$row.idPedido}" target="_blank" title="Imprimir"><i class="fa fa-file-pdf-o"></i></a>
					{if $row.idEstado eq 1}
					<button type="button" class="btn btn-primary btn-xs" action="cargarPedido" title="Cargar pedido" datos='{$row.json}'><i class="fa fa-hand-o-up"></i></button>
					{/if}
					
					{if $row.idEstado eq 3}
					<button type="button" class="btn btn-primary btn-xs" action="subirComprobante" title="Subir comprobante de pago" datos='{$row.json}'><i class="fa fa-money" aria-hidden="true"></i></button>
					{/if}
					
					{if $row.idEstado eq 5}
					<a class="btn btn-success btn-xs" href="repositorio/factura/factura{$row.idPedido}.zip" download="factura.zip"><i class="fa fa-download" aria-hidden="true"></i></a>
					{/if}

				</td>
			</tr>
		{/foreach}
	</tbody>
</table>