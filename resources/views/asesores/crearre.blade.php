@extends('layouts.plantillaAsesores')
@section('ruta','Crear Registro')
@section('contenido')
<div id="ft" class="row">
  <div class="col-sm-12">
    <fieldset class="col-md-12">
      <form action="{{ route('asesores.guardarre',  $alu->id) }}" method="get">
        <br><br>
        <div class="row">
          <div class="col-md-4 ">
            <div class="form-group">
              <label class="control-label" for="no_cont"><i style=" margin-right:2px" class="fas fa-address-card">
                </i> Número de Control </label>
              <div>
                <input type="tex" id="no_cont" name="no_cont" placeholder="Número de Control"
                  class="form-control input-md" required>
              </div>
            </div><br>
          </div>
          <div class="col-md-4 ">
            <div class="form-group">
              <label class="control-label" for="materia"><i style=" margin-right:2px" class="fas fa-address-card">
                </i> Materia</label>
              <div>
                <input type="tex" id="materia" name="materia" placeholder="Materia" class="form-control input-md"
                  required>
              </div>
            </div><br>
          </div>
          <div class="col-md-4 ">
            <div class="form-group">
              <label class="control-label" for="tema"><i style=" margin-right:2px" class="fas fa-address-card">
                </i> Tema</label>
              <div>
                <input type="tex" id="tema" name="tema" placeholder="Tema" class="form-control input-md" required>
              </div>
            </div><br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 ">
            <div class="form-group">
              <label class="control-label" for="nombre"><i style=" margin-right:2px" class="fas fa-address-card">
                </i> Nombre</label>
              <div>
                <input type="tex" id="nombre" name="nombre" placeholder="Nombre Completo" class="form-control input-md"
                  required>
              </div>
            </div><br>
          </div>
          <div class="col-md-5 ">
            <div class="form-group">
              <label class="control-label" for="fecha"><i style=" margin-right:2px" class="fas fa-address-card">
                </i>Fecha</label>
              <div>
                <input type="date" id="fecha" name="fecha" class="form-control input-md" required>
              </div>
            </div><br>
          </div>
        </div>
        <div class="panel-footer center">
          <a data-toggle="tooltip" type="button" class="btn btn-danger"
            href="{{route('asesores.reportes', $alu->id)}}">Cancelar</a>
          <input type="submit" value="Guardar" class="btn btn-success">
        </div>
        <br>
      </form>
    </fieldset>
  </div>
</div>
@endsection