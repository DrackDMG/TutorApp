@extends('layouts.plantillaAsesores')
@section('ruta','TutorApp Asesor')
@section('contenido')
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="container cuerpo">
            <div class="row">
                <fieldset class="col-md-12">
                    <div class="row align-items-center text-center">
                        <div class="col-md-12">
                            <h3 class="panel-title text"> <strong>{{ $alu->nombre }} </strong> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ">
                            <img src=" {{asset($alu->foto)}}" class="av" width="auto" height="250"
                                alt="{{ $alu->nombre }}">
                        </div>
                        <div id="tx" class=" col-md-7">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Carrera:</strong></td>
                                        <td>{{ $alu->carrera }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Correo:</strong></td>
                                        <td>{{ $alu->correo }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Teléfono:</strong></td>
                                        <td>{{ $alu->tel }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Meet:</strong></td>
                                        <td>{{ $alu->met }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="panel-footer center">
                        <a href="{{route('asesores.foto',Crypt::encrypt($alu->id))}}" data-original-title="Editar Foto"
                            data-toggle="tooltip" type="button" class="btn btn-warning">Editar foto de perfil</a>
                        <a href="{{route('asesores.edperfil',Crypt::encrypt($alu->id))}}"
                            data-original-title="Editar Datos" data-toggle="tooltip" type="button"
                            class="btn btn-primary">Editar datos personales</a>
                        <a target="_blank" href="{{ $alu->met }}" data-toggle="tooltip" type="button" class="btn "
                            style="background:#04AA6D">Meet
                            <i class='fas fa-video'
                                style='margin-left:5px;font-size:12px;color:rgb(255, 255, 255)'></i></a>
                    </div><br><br>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
<br><br>
@endsection