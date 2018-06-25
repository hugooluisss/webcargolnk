<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Productos</h1>
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
						<label for="txtCodigo" class="col-sm-2 control-label">Código</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtCodigo" name="txtCodigo"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-sm-2 control-label">Descripción</label>
						<div class="col-sm-10">
							<input class="form-control" id="txtDescripcion" name="txtDescripcion"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcionLarga" class="col-sm-2 control-label">Descripción larga</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="txtDescripcionLarga" name="txtDescripcionLarga" rows="4"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPrecio1" class="col-sm-2 control-label">Precios</label>
						<div class="col-sm-2">
							<input class="form-control text-right" id="txtPrecio1" name="precio1" placeholder="Precio 1" value="0">
						</div>
						<div class="col-sm-2">
							<input class="form-control text-right" id="txtPrecio2" name="precio2" placeholder="Precio 2" value="0">
						</div>
						<div class="col-sm-2">
							<input class="form-control text-right" id="txtPrecio3" name="precio3" placeholder="Precio 3" value="0">
						</div>
						<div class="col-sm-2">
							<input class="form-control text-right" id="txtPrecio4" name="precio4" placeholder="Precio 4" value="0">
						</div>
					</div>
					<div class="form-group">
						<label for="txtPeso" class="col-sm-2 control-label">Marca</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtMarca" name="txtMarca"/>
						</div>
						<label for="txtTipo" class="col-sm-2 control-label">Tipo</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtTipo" name="txtTipo"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtPeso" class="col-sm-2 control-label">Peso</label>
						<div class="col-sm-3">
							<input class="form-control text-right" id="txtPeso" name="txtPeso" value="0"/>
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