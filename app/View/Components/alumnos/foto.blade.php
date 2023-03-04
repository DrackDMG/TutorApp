@extends('layouts.plantillaAlumnoss')
@section('ruta','Editar Foto')
@section('contenido')
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="container cuerpo">
      <div id="ft" class="row">
        <fieldset class="col-md-12"><br><br>
          <form enctype="multipart/form-data" action="{{ route('alumnos.foto.guardar', $alu->id) }}" method="POST">
            @csrf
            <input type="file" class="form-control-file form-control-sm" id="file" name="file" accept="image/*">
            <label for="file"><i class="fas fa-camera"></i>Fotografia</label><br><br>
            <a data-toggle="tooltip" type="button" class="btn btn-danger"
              href="{{route('alumnos.perfil', Crypt::encrypt($alu->no_cont))}}">Cancelar</a>
            <input type="submit" value="Guardar" class="btn btn-success"><br>
          </form><br><br>
        </fieldset>
      </div>
    </div>
  </div>
  <div class="col-md-1"></div>
</div><br><br>
@endsection