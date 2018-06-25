<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Administración de usuarios</h1>
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
						<label for="selPerfil" class="col-sm-3 control-label">Perfil</label>
						<div class="col-sm-6">
							<select class="form-control" id="selPerfil" name="selPerfil">
								{foreach key=key item=item from=$tipos}
									<option value="{$key}">{$item}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selUnidad" class="col-sm-3 control-label">Unidad</label>
						<div class="col-sm-6">
							<select class="form-control" id="selUnidad" name="selUnidad">
								{foreach key=key item=item from=$unidades}
									<option value="{$key}">{$item}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="selPuesto" class="col-sm-3 control-label">Puestos</label>
						<div class="col-sm-6">
							<select class="form-control" id="selPuesto" name="selPuesto">
								{foreach key=key item=item from=$puestos}
									<option value="{$key}">{$item}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtNombre" name="txtNombre" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtApellidos" class="col-sm-3 control-label">Apellidos</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtApellidos" name="txtApellidos" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtEmail" class="col-sm-3 control-label">Correo electrónico</label>
						<div class="col-sm-6">
							<input class="form-control" id="txtEmail" name="txtEmail" type="email" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtPass" class="col-sm-3 control-label">Contraseña</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtPass" name="txtPass" type="password" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtNacimiento" class="col-sm-3 control-label">Fecha de Nacimiento</label>
						<div class="col-sm-2">
							<input class="form-control" id="txtNacimiento" name="txtNacimiento" type="text" readonly="true" placeholder="YYYY-mm-dd"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtNumEmp" class="col-sm-3 control-label">Número de empleado</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtNumEmp" name="txtNumEmp" type="text"/>
						</div>
						<label for="txtFechaIngreso" class="col-sm-3 control-label">Fecha de ingreso</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtFechaIngreso" name="txtFechaIngreso" type="text"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtIMSS" class="col-sm-3 control-label">Número IMSS</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtIMSS" name="txtIMSS" type="text"/>
						</div>
						<label for="txtRFC" class="col-sm-3 control-label">RFC</label>
						<div class="col-sm-3">
							<input class="form-control" id="txtRFC" name="txtRFC" type="text"/>
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