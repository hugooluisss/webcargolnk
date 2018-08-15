<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">
			Cargas
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
						<label for="txtFolio" class="col-lg-2">Código</label>
						<div class="col-lg-4">
							<input type="text" id="txtFolio" name="txtFolio" class="form-control" placeholder="" disabled="true" readonly="true"/>
						</div>
					</div>
					<div class="form-group row">
						<label for="selTipo" class="col-lg-2">Tipo</label>
						<div class="col-lg-4">
							<select class="form-control" id="selTipoCamion" name="selTipoCamion">
								{foreach key=key item=item from=$tipoCamion}
									<option value="{$item.idTipoCamion}">{$item.descripcion}
								{/foreach}
							</select>
						</div>
						<label for="selEstado" class="col-lg-2">Estado</label>
						<div class="col-lg-4">
							<select class="form-control" id="selEstado" name="selEstado">
								{foreach key=key item=item from=$estados}
									<option value="{$item.idEstado}">{$item.nombre}
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtCorreo" class="col-lg-2">Correo</label>
						<div class="col-lg-4">
							<input type="email" id="txtCorreo" name="txtCorreo" class="form-control" placeholder=""/>
						</div>
						<label for="txtTelefono" class="col-lg-2">Teléfono</label>
						<div class="col-lg-4">
							<input type="tel" id="txtTelefono" name="txtTelefono" class="form-control" placeholder=""/>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtDescripcion" class="col-lg-2">Descripción</label>
						<div class="col-lg-10">
							<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtFechaServicio" class="col-lg-2">Fecha cargo</label>
						<div class="col-lg-3">
							<input type="datetime" id="txtFechaServicio" name="txtFechaServicio" class="form-control" placeholder="Y-m-d H:i" readonly="true"/>
						</div>
					</div>
					<div class="form-group row">
						<label for="txtPresupuesto" class="col-lg-2">Presupuesto disponible</label>
						<div class="col-lg-3">
							<input type="text" id="txtPresupuesto" name="txtPresupuesto" class="form-control text-right" />
						</div>
						<label for="txtPeso" class="col-lg-2">Peso</label>
						<div class="col-lg-3">
							<input type="text" id="txtPeso" name="txtPeso" class="form-control text-right" placeholder="Toneladas" />
						</div>
					</div>
					<div class="form-group row">
						<label for="txtOrigen" class="col-lg-2">Origen</label>
						<div class="col-lg-4">
							<textarea id="txtOrigen" rows="4" name="txtOrigen" class="form-control" readonly="true"></textarea>
						</div>
						<label for="txtOrigen" class="col-lg-2">Destino</label>
						<div class="col-lg-4">
							<textarea id="txtDestino" rows="4" name="txtDestino" class="form-control" readonly="true"></textarea>
						</div>
					</div>
					<div id="dvReporteFinal">
					</div>
				</div>
				<div class="card-footer">
					<button type="reset" id="btnReset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
					<input type="hidden" id="id" name="id" value=""/>
				</div>
			</div>
		</form>
	</div>
</div>

<input type="hidden" id="auxOrden" value="{$orden}"/>

{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winMapa.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winInteresados.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winSeguimiento.tpl"}
{include file=$PAGE.rutaModulos|cat:"modulos/ordenes/winReporte.tpl"}