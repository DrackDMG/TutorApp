@extends('layouts.plantillaAlumnoss')
@section('ruta','Perfil del Asesor')
@section('contenido')
<?php
    $ms = "https://wa.me/+52". $alumno->tel;
    $total = count($comentariost);
    $calificacion = 0;
    if ($total > 0) {
        foreach($comentariost as $comentario){
            $calificacion += $comentario->puntuacion;
        }
        $calificacion = round($calificacion / $total);
    }
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="container cuerpo">
            <div class="row align-items-center">
                <fieldset class="col-md-12">
                    <div class="row align-items-center text-center">
                        <div class="col-md-12">
                            <h3 class="panel-title"> <strong>{{ $alumno->nombre }}</strong> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ">
                            <img src="{{asset($alumno->foto)}}" class="av" width="auto" height="250"
                                alt="{{ $alumno->nombre }}">
                        </div>
                        <div id="tx" class=" col-md-7">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Carrera:</strong></td>
                                        <td>{{ $alumno->carrera }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Correo:</strong></td>
                                        <td>{{ $alumno->correo }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Teléfono:</strong></td>
                                        <td>{{ $alumno->tel }} </span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Materias impartidas:</strong></td>
                                        <td>{{ $alumno->mat }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br>
                    <div id="ws" class="row">
                        <div class="col-md-3">
                            <div class="panel-footer center">
                                <a href=" {{route('alumnos.asesores', Crypt::encrypt($alu->id))}}" data-toggle="tooltip"
                                    type="button" class="btn btn-danger">Atras</a>{{-- <a href="{{ $ms }}"
                                    data-toggle="tooltip" type="button" class="btn btn-primary">Mensaje</a> --}}
                            </div>
                        </div>
                        <div class="col-md-9">
                            <a target="_blank" href="{{ $alumno->met }}" data-toggle="tooltip" type="button" class="btn"
                                style="background:#04AA6D">Video Llamada
                                <i class='fas fa-video'
                                    style='margin-left:5px;font-size:12px;color:rgb(255, 255, 255)'></i></a>
                            <a target="_blank" style="background:#037b4f" type="button" class="btn"
                                href="{{ $ms }}">WhatsApp <span class="bi bi-whatsapp green-color"></a>
                            <a href="{{route('alumnos.comentarios',[$alu->id , $alumno->id])}}"
                                style="background:#636c8f" type="button" class="btn" href="#">Evaluar<i
                                    style="margin-left: 7px" class="fas fa-gavel"></i></a>
                            <a style="background:#21273e" type="button" class="btn" href="#">Registrar Asesoria <i
                                    style="margin-left:7px" class="fas fa-clipboard"></i></a>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="container cuerpo">
        <div class="comentarios">
            <h3 class="font">Comentarios</h3>
            <h3 class="puntuacion">Calificación:
                @while ($calificacion > 0)
                <i class="fas fa-star" style="color: yellow"></i>
                <?php $calificacion--; ?>
                @endwhile
            </h3>
        </div>
        <div class="grid-comentarios">
            @if(count($comentarios)==0 && count($comentariop)==0)
            <div class="row">
                <div class="col-md-12">
                    <h3><b>No hay comentarios </b></h3></br>
                </div>
            </div>
            @endif
            @foreach($comentariop as $comentario)
            <div class="card-comentario">
                <div class="cabecera-comentario">
                    <img src="{{asset($comentario->foto)}}" class="img-com" width="auto" height="35"
                        alt="{{ $comentario->nombre }}">
                    <h5 class="font">{{ $comentario->nombre }} </h5>
                    <h6 class="estrellas">
                        <?php $pun=$comentario->puntuacion ?>
                        @while ($pun > 0)
                        <i class="fas fa-star" style="color: yellow"></i>
                        <?php $pun--; ?>
                        @endwhile
                    </h6>
                </div>
                <p class="comentario">{{ $comentario->comentario }}</p>
                <div class="d-flex justify-content-center">
                    <a href="{{route( 'alumnos.eliminarcomen' , [$alu->id, $alumno->id , $comentario->id])}}"
                        class="btn btn-danger btn-sm">Borrar Comentario<i style="margin-left: 7px"
                            class='fas fa-trash'></i></a>
                    <a href="{{route('alumnos.comentarios',[$alu->id , $alumno->id])}}" style="background:#636c8f"
                        type="button" class="btn btn-sm" href="#">Editar<i style="margin-left: 7px"
                            class="fas fa-user-edit"></i></a>
                </div>
            </div>
            @endforeach
            @foreach($comentarios as $comentario)
            <div class="card-comentario">
                <div class="cabecera-comentario">
                    <img src="{{ $comentario->foto }}" class="img-com" width="auto" height="35"
                        alt="{{ $comentario->nombre }}">
                    <h5 class="font">{{ $comentario->nombre }} </h5>
                    <h6 class="estrellas">
                        <?php $pun=$comentario->puntuacion ?>
                        @while ($pun > 0)
                        <i class="fas fa-star" style="color: yellow"></i>
                        <?php $pun--; ?>
                        @endwhile
                    </h6>
                </div>
                <p class="comentario">{{ $comentario->comentario }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div><br><br>
@endsection