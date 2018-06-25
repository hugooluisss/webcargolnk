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
						<label for="txtNombre" class="col-sm-3 control-label">Nombre completo</label>
						<div class="col-sm-8">
							<input class="form-control" id="txtNombre" name="txtNombre" />
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
						<label for="txtTelefono" class="col-sm-3 control-label">Teléfono</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtTelefono" name="txtTelefono" type="tel" />
							<span class="help-block">Incluye el código del país</span>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDireccion" class="col-sm-3 control-label">Dirección</label>
						<div class="col-sm-9">
							<textarea rows="4" id="txtDireccion" name="txtDireccion" class="form-control"></textarea>
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

{include file=$PAGE.rutaModulos|cat:"modulos/usuarios/winSuscripciones.tpl"}