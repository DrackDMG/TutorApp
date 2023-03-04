@extends('layouts.plantillaAdministrador')
@section('ruta','Comentarios de los Alumnos')
@section('contenido')
<div class="row">
    <div class="container cuerpo">
        <br>
        <div class="comentarios">
            <h3 class="font">Comentarios</h3>
        </div>
        <br>
        <div class="grid-comentarios">
            @if(count($comentarios)==0)
            <div class="row">
                <div class="col-md-12">
                    <h3><b>No hay comentarios </b></h3></br>
                </div>
            </div>
            @endif
            @foreach($comentarios as $comentario)
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
                    <a href="{{route( 'administrador.eliminarcomen' , [$admin->id, $comentario->id])}}"
                        class="btn btn-danger btn-sm">Borrar Comentario<i style="margin-left: 7px"
                            class='fas fa-trash'></i></a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<br><br>
@endsection