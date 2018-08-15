<div class="row">
	{foreach from=$fotos item="row"}
		<div class="col-3 text-center">
			<a href="{$row}" download="reporte.jpg" title="Click para descargar">
				<img src="{$row}" style="max-height: 400px;" class="img-responsive" />
			</a>
		</div>
	{/foreach}
</div>
<br />
<div class="row">
	<div class="col-12"><b>Comentario</b></div>
</div>
<div class="row">
	<div class="col-12">{$comentarios}</div>
</div>