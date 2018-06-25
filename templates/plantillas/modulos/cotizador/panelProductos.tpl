<div class="row">
	{foreach from=$productos item="row"}
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 producto" style="cursor: pointer; height: 400px;" busqueda="{$row.codigo} {$row.descripcion} {$row.descripcionlarga} {$row.marca} {$row.tipo}" marca="{str_replace(" ", "_", $row.marca)}" tipo="{str_replace(" ", "_", $row.tipo)}" data-toggle="modal" data-target="#winDescripcionProducto" datos='{$row.json}'>
			<div class="panel panel-default">
				<div class="panel-body">
					<img src="{$PAGE.iconos}/producto.png" class="img-responsive"/>
					<br />
					<div class="text-center">
						<b>{$row.codigo}</b>
						<span style="font-size: 12px;">{$row.descripcion}</span>
						<br />
						<span style="font-size: 12px;">{$row.marca}, {$row.tipo}, {$row.peso|default:0}gr</span>
						<br />
						<span class="text-primary price">
							{if $PAGE.usuario->getPerfil() eq 1}
								$ {$row.precio1|number_format:2:".":","}
							{/if}
							
							{if $PAGE.usuario->getPerfil() eq 2}
								{if $PAGE.usuario->suscripcion->membresia->getNoPrecio() eq 1}
									$ {$row.precio1|number_format:2:".":","}
								{/if}
								{if $PAGE.usuario->suscripcion->membresia->getNoPrecio() eq 2}
									$ {$row.precio2|number_format:2:".":","}
								{/if}
								{if $PAGE.usuario->suscripcion->membresia->getNoPrecio() eq 3}
									$ {$row.precio3|number_format:2:".":","}
								{/if}
								{if $PAGE.usuario->suscripcion->membresia->getNoPrecio() eq 4}
									$ {$row.precio4|number_format:2:".":","}
								{/if}
							{/if}
							
							{if $PAGE.usuario->getPerfil() eq 3}
								$ {$row.precio1|number_format:2:".":","}
							{/if}
						</span>
					</div>
				</div>
			</div>
		</div>
	{/foreach}
</div>