<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Solicitudes</h1>
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
						<label for="txtFecha" class="col-sm-2 control-label">Fecha</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtFecha" name="txtFecha" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-sm-2 control-label">Usuario</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtUsuario" name="txtUsuario" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtUnidad" class="col-sm-2 control-label">Unidad</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtUnidad" name="txtUnidad" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-sm-2 control-label">Departamento al que solicita</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtDepartamento" name="txtDepartamento" disabled="true" readonly="true" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-sm-2 control-label">Cuerpo de la solicitud</label>
						<div class="col-sm-10">
							<textarea disabled="true" readonly="true" id="txtCuerpo" name="txtCuerpo" class="form-control" rows="8"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-sm-2 control-label">Estado</label>
						<div class="col-sm-10">
							<select id="selEstado" name="selEstado" class="form-control">
								<option value="0">Pendiente</option>
								<option value="1">Atendida</option>
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