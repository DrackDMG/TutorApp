@extends('layouts.plantillaAdministrador')
@section('ruta','Editar Perfil')
@section('contenido')
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="container cuerpo">
      <div id="ft" class="row">
        <fieldset class="col-md-12">
          <form action="{{ route('administrador.edperfil.guardar', $admin->id) }}" method="get"><br><br>
            <div class="form-group">
              <label class="col-md-5 control-label" for="email"><i style=" margin-right:2px"
                  class="fas fa-address-card"></i> Correo electrónico</label>
              <div class="col-md-9">
                <input type="email" id="email" name="email" placeholder="Correo electrónico"
                  class="form-control input-md" value="{{ $admin->correo }}" required>
              </div>
            </div><br>
            <div class="panel-footer center">
              <a data-toggle="tooltip" type="button" class="btn btn-danger"
                href="{{route('administrador.perfil', Crypt::encrypt($admin->matricula) )}}">Cancelar</a>
              <input type="submit" value="Guardar" class="btn btn-success">
            </div><br>
          </form>
        </fieldset>
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
@endsection