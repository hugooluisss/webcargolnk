<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Secciones</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
  <li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">			
					<div class="form-group">
						<label for="txtTitulo" class="col-sm-2 control-label">Título</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtTitulo" name="txtTitulo" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtReferencia" class="col-sm-2 control-label">Referencia</label>
						<div class="col-sm-6">
							<input class="form-control" id="txtReferencia" name="txtReferencia" />
						</div>
					</div>
					<div class="form-group">
						<label for="selPublicado" class="col-sm-2 control-label">Publcado</label>
						<div class="col-sm-4">
							<select id="selPublicado" name="selPublicado" class="form-control">
								<option value="1">Si</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCuerpo" class="col-sm-2 control-label">Cuerpo (HTML)</label>
						<div class="col-sm-10">
							<textarea name="txtCuerpo" id="txtCuerpo" rows="10" class="form-control"></textarea>
						</div>
					</div>
					
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>