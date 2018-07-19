<div id="winDocumentos" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Documentos</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-primary" role="alert"><i class="fa-spinner fa-pulse fa-3x fa-fw"></i>Subiendo archivo...</div>
				
				<form role="form" id="frmUpload" action="?mod=ctransportistas&action=upload" method="post" class="form-horizontal" onsubmit="javascript: return false;" enctype="multipart/form-data">
					<div class="input-group row">
						<label class="col-4" for="nombre">Cambiar nombre</label>
						<div class="col-8">
							<input id="nombre" name="nombre" class="form-control" />
						</div>
					</div>
					<div class="input-group row">
						<label class="col-4" for="upl">Archivo</label>
						<div class="col-8">
							<input type="file" name="upl" class="form-control" />
						</div>
					</div>
					
				</form>
				<hr />
				<ul class="list-group lista">
				</ul>
			</div>
		</div>
	</div>
</div>