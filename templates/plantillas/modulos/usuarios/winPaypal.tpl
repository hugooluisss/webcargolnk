<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
	<div class="modal fade" id="winPaypal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3>Paga ahora tu membresía <span campo="titulo"></span> </h3>
				</div>
				<div class="modal-body">
					<p>Reliza el pago en este momento y empieza a disfrutar de nuestros servicios</p>
					<h4>$ <span campo="precio"></span> + 6% = $ <span campo="precioTotal" class="text-danger"></span> USD</h4>
					<small>El pago por Paypal incluye un 6% de comisión</small>
									
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="add" value="1">
					<input type="hidden" name="business" value="{$ini.paypal.email}">
					<input type="hidden" name="item_name" campo="titulo" value="Membresia">
					<input type="hidden" name="item_number" campo="idMembresia" value="">
					<input type="hidden" name="amount" campo="precio" value="">
					<input type="hidden" name="shipping" value="0">
					<input type="hidden" name="shipping2" value="0">
					<input type="hidden" name="handling" value="0 ">
					<input type="hidden" name="currency_code" value="USD">
					<input type="hidden" name="undefined_quantity" value="1">
					<input type="hidden" name="return" campo="retorno"/>
				</div>
				<div class="modal-footer">
					<button type="submit" name="submit" class="btn btn-primary btn-block">Adquirir ahora <i class="fa fa-paypal" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
</form>
<input type="hidden" id="url" value="{$PAGE.url}" />
<input type="hidden" id="usuario" value="{$PAGE.usuario->getId()}" />