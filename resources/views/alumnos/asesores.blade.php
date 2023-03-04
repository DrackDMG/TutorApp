@extends('layouts.plantillaAlumnoss')
@section('ruta','Ver Asesores')
@section('contenido')
<div class="row align-items-center text-center">
    <div class="col-md-12">
        <div class="container cuerpo">
            <div id="txt" class="row">
                <div class="cav">
                    <form action="{{route('alumnos.asesores', Crypt::encrypt($alu->id))}}" method="get">
                        <div>
                            <input type="search" name="buscar" placeholder="Materia">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="mmnc">
                    @foreach($asesores as $asesor )
                    <div class="cardd">
                        <img src="{{asset($asesor->foto)}}" alt="{{ $asesor->nombre }}" class="card__imag">
                        <p class="card__nam">{{ $asesor->nombre }}</p>
                        <div class="grid-containe">
                            <div class="grid-child-post">
                                <b>Número de control:</b> {{ $asesor->no_cont }}
                            </div>
                            <div class="grid-child-follower">
                                <b> Materias Impartidas: </b> {{ $asesor->mat }}
                            </div>
                        </div>
                        <a style="font-size: 12px" href="{{route( 'alumnos.veras' , [$alu->id , $asesor->id])}}"
                            class=" btn btn-primary btn-sm">Ver Perfil</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><br><br>
    </div>
</div><br><br>
@endsection