<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">
			Transportistas
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
						<label for="txtRazonSocial" class="col-md-2">Razón social</label>
						<div class="col-md-6">
							<input class="form-control" id="txtRazonSocial" name="txtRazonSocial">
						</div>
					</div>
					<div class="form-group row">
						<label for="selPerfil" class="col-md-2">Tipo Camion</label>
						<div class="col-md-4">
							<select class="form-control" id="selTipoCamion" name="selTipoCamion">
								{foreach key=key item=item from=$tipoCamion}
									<option value="{$item.idTipoCamion}">{$item.descripcion}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtNombre" class="col-md-2">Representante</label>
						<div class="col-md-6">
							<input class="form-control" id="txtRepresentante" name="txtRepresentante">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtNombre" class="col-md-2">Patente</label>
						<div class="col-md-6">
							<input class="form-control" id="txtPatente" name="txtPatente">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtRUT" class="col-md-2">RUT</label>
						<div class="col-md-6">
							<input class="form-control" id="txtRUT" name="txtRUT">
						</div>
					</div>
					
					<div class="form-group row">
						<label for="txtEmail" class="col-md-2">Correo electrónico</label>
						<div class="col-md-3">
							<input class="form-control" id="txtCorreo" name="txtCorreo" type="email">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtTelefono" class="col-md-2">Teléfono</label>
						<div class="col-md-3">
							<input class="form-control" id="txtTelefono" name="txtTelefono" type="tel">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtPass" class="col-md-2">Contraseña</label>
						<div class="col-md-3">
							<input class="form-control" id="txtPass" name="txtPass" type="password">
						</div>
					</div>
					
					<hr />
					<div class="form-group row">
						<label for="selAprobado" class="col-md-2">¿Registro completo?</label>
						<div class="col-md-3">
							<select id="selAprobado" name="selAprobado" class="form-control">
								<option value="0">No</option>
								<option value="1">Si</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="selCalificacion" class="col-md-2">Calificación</label>
						<div class="col-md-2">
							<select id="selCalificacion" name="selCalificacion" class="form-control">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
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

{include file=$PAGE.rutaModulos|cat:"modulos/transportistas/winUpload.tpl"}