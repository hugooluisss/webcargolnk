<div class="box">
	<div class="box-body">
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Clave</th>
					<th>Nombre</th>
					<th>Ícono</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					{assign var=aleatorio value=10|mt_rand:1000}
					<tr>
						<td style="border-left: 3px solid {$row.color1}">{$row.clave}</td>
						<td>{$row.nombre}</td>
						<td class="text-center" style="background: {$row.color1}">
							{if $row.icono neq ''}
								<img src="{$row.icono}?{$aleatorio}" style="width: 25px; height: 25px" />
							{/if}
						</td>
						<td style="text-align: right">
							<button type="button" class="btn btn-primary btn-xs" action="uploadPortada" title="Subir imagen de portada" identificador='{$row.idDepartamento}'><i class="fa fa-picture-o"></i></button>
							
							<button type="button" class="btn btn-primary btn-xs" action="uploadIcono" title="Subir ícono" identificador='{$row.idDepartamento}'><i class="fa fa-upload"></i></button>
							<button type="button" class="btn btn-success btn-xs" action="modificar" title="Modificar" identificador='{$row.idDepartamento}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" identificador="{$row.idDepartamento}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>