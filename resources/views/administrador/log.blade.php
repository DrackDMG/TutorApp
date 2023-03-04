@extends('layouts.plantilla')
@section('ruta','Administrador')
@section('contenido')
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <fieldset class="col-md-12">
            <form action="{{route('administrador.sesion')}}" method="POST">
                @csrf
                <div class="auth-wrapper">
                    <div class="auth-content">
                        <div class="card" id="log">
                            <div class="row align-items-center text-center">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <img src="{{asset('assets/img/logonew.png')}}" alt="" class="img-fluid mb-4">
                                        <h4 class="mb-3 f-w-400">Iniciar Sesión</h4>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class='fas fa-user-circle'></i></span>
                                            <input name="matricula" id="let" type="text" class="form-control"
                                                placeholder="Matricula">
                                        </div>
                                        <div class="input-group mb-4">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            <input name="pass" id="pass" type="password" class="form-control"
                                                placeholder="Contraseña">
                                        </div>
                                        <input type="submit" id="bn" value="Entrar"
                                            class="btn btn-block btn-primary mb-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection