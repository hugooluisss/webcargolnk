<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">
			Catálogo de tipo de camiones
		</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-pills">
  <li class="nav-item">
  	<a class="nav-link active" role="tab" data-toggle="pill" href="#listas">Lista</a>
  </li>
  <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane container active">
		<div id="dvLista">
		</div>
	</div>
	
	<div id="add" class="tab-pane container">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="card">
				<div class="card-body">
					<div class="form-group row">
						<label for="txtDescripcion" class="col-md-2">Descripción</label>
						<div class="col-md-6">
							<input class="form-control" id="txtDescripcion" name="txtDescripcion">
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>