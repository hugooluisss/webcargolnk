<div class="modal fade" id="winFiltros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Filtro</h3>
			</div>
			<div class="modal-body">				
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<b>Tipos</b>
						<select class="form-control" id="selTipos" multiple="true" style="height: 150px;">
							{foreach from=$tipos item="row" key="iden"}
								<option value="{str_replace(" ", "_", $iden)}">{$iden}</option>
							{/foreach}
						</select>
					</div>
					<div class="col-xs-12 col-sm-6">
						<b>Marcas</b>
						<select class="form-control" id="selMarcas" multiple="true" style="height: 150px;">
							{foreach from=$marcas item="row" key="iden"}
								<option value="{str_replace(" ", "_", $iden)}">{$iden}</option>
							{/foreach}
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>