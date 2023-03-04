@extends('layouts.plantillaAlumnoss')
@section('ruta','Evaluar Asesor')
@section('contenido')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="container cuerpo">
            <div class="row">
                <fieldset class="col-md-12">
                    <form action="{{ route('alumnos.editarcomen.guardar', [$alu->id , $ase->id, $idcom]) }}"
                        method="get"><br><br>
                        <div class="form-group">
                            <div id="ft">
                                <label class="col-md-5 control-label" for="comentario"><i style=" margin-right:2px"
                                        class="fas fa-address-card"></i> Calificación</label>
                            </div>
                            <p class="clasificacion">
                                <input id="radio1" type="radio" name="puntuacion" @if($puntuacion==5) checked @endif
                                    value="5" required>
                                <label class="label" for="radio1">★</label>
                                <input id="radio2" type="radio" name="puntuacion" @if($puntuacion==4) checked @endif
                                    value="4" required>
                                <label class="label" for="radio2">★</label>
                                <input id="radio3" type="radio" name="puntuacion" @if($puntuacion==3) checked @endif
                                    value="3" required>
                                <label class="label" for="radio3">★</label>
                                <input id="radio4" type="radio" name="puntuacion" @if($puntuacion==2) checked @endif
                                    value="2" required>
                                <label class="label" for="radio4">★</label>
                                <input id="radio5" type="radio" name="puntuacion" @if($puntuacion==1 || $puntuacion==''
                                    ) checked @endif value="1" required>
                                <label class="label" for="radio5">★</label>
                            </p>
                        </div><br>
                        <div id="ft">
                            <div class="form-group">
                                <label class="col-md-5 control-label" for="comentario"><i style=" margin-right:2px"
                                        class="fas fa-address-card"></i> Comentario</label>
                                <div class="col-md-9">
                                    <input type="comentario" id="comentario" name="comentario" placeholder="Comentario"
                                        class="form-control input-md" value="{{ $comentario }}" required>
                                </div>
                            </div><br>
                            <div class="panel-footer center">
                                <a data-toggle="tooltip" type="button" class="btn btn-danger"
                                    href="{{route('alumnos.veras', [$alu->id , $ase->id])}}">Cancelar</a>
                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>
                        </div><br>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
@endsection