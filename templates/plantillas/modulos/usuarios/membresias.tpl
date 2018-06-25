<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Adquiere tu membresia</h1>
	</div>
</div>

<div class="row">
	{foreach from=$membresias item="row"}
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class="box box-danger">
				<div class="box-heading">
					<div class="col-xs-12">
						<h2 class="text-danger"> {$row.titulo} <i class="fa fa-star" aria-hidden="true"></i></h2>
						<br />
						<b> USD $ {$row.precio}</b>
						<small class="text-muted"> Precio mensual</small>
						<br />
						<br />
					</div>
				</div>
				<div class="box-body">
					<div class="col-xs-12">
						<p>
						{$row.descripcion}
						</p>
					</div>
				</div>
				<div class="box-footer text-right">
					{if $row.precio eq 0}
						<a href="#" class="btn btn-success gratis" datos='{$row.json}'> <i class="fa fa-check" aria-hidden="true"></i>
 Gratis</a>
					{else}
						<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#winPaypal" title="Pagar por paypal" datos='{$row.json}'><i class="fa fa-paypal" aria-hidden="true"></i></a>
						
						<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#winEfectivo" title="Pagar en efectivo" datos='{$row.json}'><i class="fa fa-money" aria-hidden="true"></i></a>
					{/if}
				</div>
			</div>
		</div>
	{/foreach}
</div>
{include file=$PAGE.rutaModulos|cat:"modulos/usuarios/winPaypal.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/usuarios/winEfectivo.tpl"}