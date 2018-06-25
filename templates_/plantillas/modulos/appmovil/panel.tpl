<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Configuración de la app</h1>
	</div>
</div>

<div id="listas" class="panel">
	<div id="dvLista" class="panel-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Código</th>
					<th>Publicacion</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.clave}</td>
						<td>
							<select clave="{$row.clave}" class="form-control setSeccion">
								{foreach from=$secciones item="seccion"}
									<option value="{$seccion.idSeccion}" {if $seccion.idSeccion eq $row.idSeccion}selected="true"{/if}>{$seccion.titulo}</option>
								{/foreach}
							</select>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>