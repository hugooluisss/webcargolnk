<table id="tblSuscripciones" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Titulo</th>
			<th>Caduca</th>
			<th>Pagado en</th>
			<th>Referencia</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$lista item="row"}
			<tr>
				<td>{$row.titulo}</td>
				<td>{$row.fechalimite}</td>
				<td>{$row.metodopago}</td>
				<td>{$row.referencia}</td>
				<td style="text-align: right">
					<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="{$row.idSuscripcion}"><i class="fa fa-times"></i></button>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>