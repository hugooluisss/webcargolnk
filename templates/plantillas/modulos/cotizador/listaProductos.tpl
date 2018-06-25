<div class="box">
	<div class="box-body" style="width: 100%; overflow: auto">
		<table id="tblListaProductos" class="table table-bordered table-hover">
			<thead>
				<tr>
					{if $PAGE.usuario->getPerfil() eq 1}
						{if in_array($pedido->estado->getId(), array(1, 2))}
							{assign var="rowspan" value=4}
							<th style="width: 60px;">&nbsp;</th>
						{else}
							{assign var="rowspan" value=3}
						{/if}
					{/if}
					
					{if $PAGE.usuario->getPerfil() eq 2}
						{if in_array($pedido->estado->getId(), array(1))}
							{assign var="rowspan" value=4}
							<th style="width: 60px;">&nbsp;</th>
						{else}
							{assign var="rowspan" value=3}
						{/if}
					{/if}
					
					{if $PAGE.usuario->getPerfil() eq 3}
						{assign var="rowspan" value=3}
					{/if}
					
					<th>Clave</th>
					<th>Descripción</th>
					<th>P. U.</th>
					<th>Cantidad</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				{assign var="subtotal" value=0}
				{assign var="items" value=0}
				{foreach from=$lista item="row"}
					<tr>
						{assign var="items" value=($items+$row.cantidad)}
						
						{if $PAGE.usuario->getPerfil() eq 1}
							{if in_array($pedido->estado->getId(), array(1, 2))}
								<td>
									<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" idMovimiento="{$row.idMovimiento}"><i class="fa fa-times"></i></button>
								</td>
							{/if}
						{/if}
						
						{if $PAGE.usuario->getPerfil() eq 2}
							{if in_array($pedido->estado->getId(), array(1))}
								<td>
									<button type="button" class="btn btn-danger btn-xs" action="eliminar" title="Eliminar" idMovimiento="{$row.idMovimiento}"><i class="fa fa-times"></i></button>
								</td>
							{/if}
						{/if}
						
						<td>{$row.codigo}</td>
						<td>{$row.descripcion}</td>
						{if $PAGE.usuario->getPerfil() eq 1}
							<td class="text-right">{$row.precio}</td>
							<td class="text-right">
								{if in_array($pedido->estado->getId(), array(1, 2))}
									<button class="btn btn-primary btn-block changeCantidad" movimiento="{$row.idMovimiento}" cantidad="{$row.cantidad}">{$row.cantidad}</button>
								{else}
									{$row.cantidad}
								{/if}
							</td>
							<td class="text-right">{($row.cantidad*$row.precio)|number_format:2:".":","}</td>
							{assign var="subtotal" value=$subtotal+($row.cantidad*$row.precio)}
						{/if}
						
						{if $PAGE.usuario->getPerfil() eq 2}
							<td class="text-right">{$row.precio}</td>
							<td class="text-right">
								{if in_array($pedido->estado->getId(), array(1))}
									<button class="btn btn-primary btn-block changeCantidad" movimiento="{$row.idMovimiento}" cantidad="{$row.cantidad}">{$row.cantidad}</button>
								{else}
									{$row.cantidad}
								{/if}
							</td>
							<td class="text-right">{($row.cantidad*$row.precio)|number_format:2:".":","}</td>
							{assign var="subtotal" value=$subtotal+($row.cantidad*$row.precio)}
						{/if}
						
						{if $PAGE.usuario->getPerfil() eq 3}
							<td class="text-right">{$row.precio1}</td>
							<td class="text-right">
								{$row.cantidad}
							</td>
							
							<td class="text-right">{($row.cantidad*$row.precio1)|number_format:2:".":","}</td>
							{assign var="subtotal" value=$subtotal+($row.cantidad*$row.precio1)}
						{/if}
					</tr>
					
					
				{/foreach}
			</tbody>
			<tfoot>
				<tr>
					<th colspan="{$rowspan}" class="text-right">Sumatoria</th>
					<th class="text-right">{$items|number_format:0:".":","}</th>
					<th class="text-right">{$subtotal|number_format:2:".":","}</th>
				</tr>
				{if in_array($pedido->estado->getId(), array(2, 3))}
				<tr>
					<th colspan="{$rowspan+1}" class="text-right">Envío</th>
					<th class="text-right">
						{if in_array($pedido->estado->getId(), array(1, 2, 3))  and $PAGE.usuario->getPerfil() neq 2}
						<input style="width: 100px" class="form-control text-right" envio subtotal="{$subtotal}" anterior="{$pedido->getEnvio()}" value="{$pedido->getEnvio()|number_format:2:".":""}" />
						{else}
							{$pedido->getEnvio()|number_format:2:".":""}
						{/if}
					</th>
				</tr>
				
				<tr>
					<th colspan="{$rowspan+1}" class="text-right">Total</th>
					<th class="text-right" id="subtotal" valor="{($pedido->getEnvio()+$subtotal)}">{($pedido->getEnvio()+$subtotal)|number_format:2:".":","}</th>
				</tr>
				{/if}
			</tfoot>
		</table>
	</div>
</div>