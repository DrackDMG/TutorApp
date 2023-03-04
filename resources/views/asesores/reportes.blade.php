@extends('layouts.plantillaAsesores')
@section('ruta','Generar Reporte')
@section('contenido')
<div id="txt" class="row align-items-center text-center">
    <fieldset class="col-md-12"><br>
        <div><a target="_blank" href="{{route('asesores.pdf', $alu->id)}}" class="btn btn-primary btn-sm">Generar
                Reporte PDF</i></a>
        </div><br>
        <table class="table table-bordered table-hover table-sortable" id="tableFam">
            <thead>
                <tr>
                    <th><strong>Numero de control</strong></th>
                    <th><strong>Nombre</strong></th>
                    <th><strong>Fecha</strong></th>
                    <th> <a href="{{ route('asesores.crearre', $alu->id) }}" class="btn btn-success btn-sm"> Agregar</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($rep as $re )
                <tr>
                    <td>{{ $re->no_cont2 }}</td>
                    <td>{{ $re->nombre }}</td>
                    <td>{{ $re->fecha }}</td>
                    <td>
                        <a style="margin-bottom: 5px; min-width: 60px"
                            href="{{route( 'asesores.editarre' , [$alu->id , $re->id])}}"
                            class="btn btn-warning btn-sm"><i class='fas fa-user-edit' style='font-size:12px'></i></a>
                        <a style="margin-bottom: 5px; min-width: 60px"
                            href="{{route( 'asesores.eliminarre' , [$alu->id , $re->id])}}"
                            class="btn btn-danger btn-sm">
                            <i class='fas fa-trash' style='font-size:12px'></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><br><br>
    </fieldset>
</div>
@endsection