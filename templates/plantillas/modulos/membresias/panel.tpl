<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Membresias</h1>
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
						<div class="col-sm-3">
							<input class="form-control" id="txtTitulo" name="txtTitulo">
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-sm-2 control-label">Color</label>
						<div class="col-sm-10">
							<textarea id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPrecio" class="col-sm-2 control-label">Precio</label>
						<div class="col-sm-3">
							<input type="number" class="form-control" id="txtPrecio" name="txtPrecio" value="0">
						</div>
					</div>
					<div class="form-group">
						<label for="selPrecio" class="col-sm-2 control-label">No Precio</label>
						<div class="col-sm-2">
							<select id="selPrecio" name="selPrecio" class="form-control">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
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