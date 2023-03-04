@extends('layouts.plantillaAsesores')
@section('ruta','Comentarios de los Alumnos')
@section('contenido')
<?php
    $total = count($comentarios);
    $calificacion = 0;
    if ($total > 0) {
        foreach($comentarios as $comentario){
            $calificacion += $comentario->puntuacion;
        }
        $calificacion = round($calificacion / $total);
    }
?>
<div class="row">
    <div class="container cuerpo">
        <br>
        <div class="comentarios">
            <h3 class="font">Comentarios</h3>{{ $total }}
            <h3 class="puntuacion">Puntuacion:
                @while ($calificacion > 0)
                <i class="fas fa-star" style="color: yellow"></i>
                <?php $calificacion--; ?>
                @endwhile
            </h3>
        </div>
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
            </div>
            @endforeach

        </div>
    </div>
</div>
<br><br>
@endsection