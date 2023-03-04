@extends('layouts.plantillaAdministrador')
@section('ruta','Ver Asesores')
@section('contenido')

<div id="txt" class="row align-items-center text-center">
    <fieldset class="col-md-12">
        <div style="display: flex; justify-content:end; width: 100%; padding: 10px 23px 10px 0;">
            <div>
                <form action="{{route('administrador.asesores', $admin->id)}}" method="get">
                    <input type="search" name="buscar" placeholder="Número de control">
                    <button type="submit" href="#"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-hover table-sortable" id="tableFam">
            <thead>
                <tr>
                    <th><strong>Número de control</strong></th>
                    <th><strong>Nombre</strong></th>
                    <th><strong>Contraseña</strong></th>
                    <th> <a href="{{ route('administrador.crearas', $admin->id) }}" class="btn btn-success btn-sm"><i
                                class='fas fa-user-plus' style='font-size:12px'></i>
                        </a></th>
                </tr>
            </thead>
            <tbody>
                @foreach($asesores as $asesor )
                <tr>
                    <td>{{ $asesor->no_cont }}</td>
                    <td>{{ $asesor->nombre }}</td>
                    <td>{{ $asesor->pass }}</td>
                    <td>
                        <a style="margin-bottom: 5px; min-width: 60px"
                            href="{{route( 'administrador.editaras' , [$admin->id , $asesor->id])}}"
                            class="btn btn-warning btn-sm"><i class='fas fa-user-edit' style='font-size:12px'></i></a>
                        <a style="margin-bottom: 5px; min-width: 60px"
                            href="{{route( 'administrador.eliminaras' , [$admin->id , $asesor->id])}}"
                            class="btn btn-danger btn-sm">
                            <i class='fas fa-trash' style='font-size:12px'></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><br>

    </fieldset>
</div>
@endsection