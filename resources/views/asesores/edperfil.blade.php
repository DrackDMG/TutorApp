@extends('layouts.plantillaAsesores')
@section('ruta','Editar Perfil')
@section('contenido')
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="container cuerpo">
      <div id="ft" class="row">
        <fieldset class="col-md-12">
          <form action="{{ route('asesores.edperfil.guardar', $alu->id) }}" method="get"><br><br>
            <div class="form-group">
              <label class="col-md-5 control-label" for="tel"><i style=" margin-right:4px"
                  class="fas fa-mobile-alt"></i>Número de teléfono</label>
              <div class="col-md-9">
                <input id="tel" name="tel"
                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                  type="number" maxlength="10" placeholder="Número telefonico" class="form-control input-md"
                  value="{{ $alu->tel }}" required />
              </div>
            </div><br>
            <div class="form-group">
              <label class="col-md-5 control-label" for="email"><i style=" margin-right:2px"
                  class="fas fa-address-card"></i> Correo electrónico</label>
              <div class="col-md-9">
                <input type="email" id="email" name="email" placeholder="Correo electrónico"
                  class="form-control input-md" value="{{ $alu->correo }}" required>
              </div>
            </div><br>
            <div class="form-group">
              <label class="col-md-5 control-label" for="meet"><i style=" margin-right:2px"
                  class="fas fa-address-card"></i> Enlace de google meet</label>
              <div class="col-md-9">
                <input type="text" id="meet" name="meet" placeholder=" Enlace de google meet"
                  class="form-control input-md" value="{{ $alu->met }}" required>
              </div>
            </div><br>
            <div class="panel-footer center">
              <a data-toggle="tooltip" type="button" class="btn btn-danger"
                href="{{route('asesores.perfil', Crypt::encrypt($alu->no_cont))}}">Cancelar</a>
              <input type="submit" value="Guardar" class="btn btn-success">
            </div> <br>
          </form>
        </fieldset>
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>
@endsection