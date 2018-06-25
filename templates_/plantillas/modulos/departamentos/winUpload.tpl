<div class="modal fade" id="winUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Subir archivo imagen</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-info">
					<p>Se sugiere el uso de imágenes en formato png con resolución de 150px por 150px</p>
				</div>
				
				<form id="frmUpload" method="post" action="" enctype="multipart/form-data">
					<input type="file" name="upl" accept="image/png"/>
					<ul class="elementos list-group">
					<!-- The file list will be shown here -->
					</ul>
				</form>
			</div>
		</div>
	</div>
</div>