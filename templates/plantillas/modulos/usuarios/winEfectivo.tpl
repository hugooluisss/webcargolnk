<div class="modal fade" id="winEfectivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" datos="">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Paga ahora tu membresía <span campo="titulo"></span> </h3>
			</div>
			<div class="modal-body">
				<h4>$ <span campo="precio"></span></h4>
				<small>La aprobación del pago puede tardar hasta 24 horas</small>
				<br />
				<br />
				<p>Sube tu comprobante de pago</p>
				<form id="upload" method="post" action="?mod=csuscripciones&action=uploadfile" enctype="multipart/form-data">
					<input type="hidden" name="membresia" id="membresia" value="" campo="idMembresia"/>
					<input type="file" name="upl" accept="image/jpg,image/jpeg"/>
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>