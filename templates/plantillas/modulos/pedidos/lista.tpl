<div class="box">
	<div class="box-body">
		<table id="tblPedidos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Estado</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td style="border-left: 4px solid {$row.color}">{$row.idPedido}</td>
						<td>{$row.fecha}</td>
						<td>{$row.cliente}</td>
						<td>{$row.estado}</td>
						<td style="text-align: right">
							<a class="btn btn-primary btn-xs" href="?mod=ccotizador&action=imprimir&id={$row.idPedido}" target="_blank" title="Imprimir"><i class="fa fa-file-pdf-o"></i></a>
							{if in_array($row.idEstado, array(2, 3))}
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							{/if}
							{if $row.idEstado eq 4}
								<button type="button" class="btn btn-success btn-xs" action="facturar" title="Facturar" datos='{$row.json}'><i class="fa fa-file-text"></i></button>
							{/if}
							{if $row.idEstado eq 5}
								<button type="button" class="btn btn-success btn-xs" action="enviar" title="Envío" datos='{$row.json}'><i class="fa fa-truck"></i></button>
							{/if}
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>