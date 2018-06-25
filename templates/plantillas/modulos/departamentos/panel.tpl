<div class="row">
	<div class="col-sm-12">
		<h1 class="page-header">Catálogo de Departamentos</h1>
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
						<label for="txtTitulo" class="col-sm-2 control-label">Clave</label>
						<div class="col-sm-4">
							<input class="form-control" id="txtClave" name="txtClave" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtNombre" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="txtNombre" name="txtNombre" />
						</div>
					</div>
					<div class="form-group">
						<label for="txtColor" class="col-sm-2 control-label">Color 1</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txtColor1" name="txtColor1"/>
						</div>
						<label for="txtColor" class="col-sm-2 control-label">Color 2</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txtColor2" name="txtColor2"/>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCuerpo" class="col-sm-2 control-label">Cuerpo (HTML)</label>
						<div class="col-sm-10">
							<textarea name="txtCuerpo" id="txtCuerpo" rows="10" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="txtCuerpo" class="col-sm-2 control-label">Formulario</label>
						<div class="col-sm-10">
							<textarea name="txtFormulario" id="txtFormulario" rows="10" class="form-control" placeholder="Código HTML sin etiqueta <form />"></textarea>
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

{include file=$PAGE.rutaModulos|cat:"modulos/departamentos/winUpload.tpl"}