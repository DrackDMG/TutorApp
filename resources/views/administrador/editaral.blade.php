@extends('layouts.plantillaAdministrador')
@section('ruta','Editar Alumno')
@section('contenido')
<div id="ft" class="row">
    <div class="col-sm-12">
        <fieldset class="col-md-12">
            <form action="{{ route('administrador.editaral.guardar',  [$admin->id , $alumno->id]) }}" method="get">
                <br><br>
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label class="control-label" for="no_cont"><i style=" margin-right:2px"
                                    class="fas fa-address-card">
                                </i> Número de Control </label>
                            <div>
                                <input value="{{ $alumno->no_cont }}" type="tex" id="no_cont" name="no_cont"
                                    placeholder="Número de Control" class="form-control input-md" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label class="control-label" for="pass"><i style=" margin-right:2px"
                                    class="fas fa-address-card">
                                </i> Contraseña</label>
                            <div>
                                <input value="{{ $alumno->pass }}" type="tex" id="pass" name="pass"
                                    placeholder="Contraseña" class="form-control input-md" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label class="control-label" for="pass"><i style=" margin-right:2px"
                                    class="fas fa-address-card">
                                </i> Carrera</label>
                            <div>
                                <input value="{{ $alumno->carrera }}" type="tex" id="carrera" name="carrera"
                                    placeholder="Carrera" class="form-control input-md" required>
                            </div>
                        </div><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 ">
                        <div class="form-group">
                            <label class="control-label" for="nombre"><i style=" margin-right:2px"
                                    class="fas fa-address-card">
                                </i> Nombre</label>
                            <div>
                                <input value="{{ $alumno->nombre }}" type="tex" id="nombre" name="nombre"
                                    placeholder="Nombre Completo" class="form-control input-md" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="col-md-4 ">
                        <div class="form-group">
                            <label class="control-label" for="correo"><i style=" margin-right:2px"
                                    class="fas fa-address-card">
                                </i> Correo electrónico</label>
                            <div>
                                <input value="{{ $alumno->correo }}" type="email" id="correo" name="correo"
                                    placeholder="Correo Electronico" class="form-control input-md" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="col-md-3 ">
                        <div class="form-group">
                            <label class="control-label" for="tel"><i style=" margin-right:4px"
                                    class="fas fa-mobile-alt"></i>Número de
                                teléfono</label>
                            <div>
                                <input value="{{ $alumno->tel }}" id="tel" name="tel"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type="number" maxlength="10" placeholder="Número telefonico"
                                    class="form-control input-md" required />
                            </div>
                        </div><br>
                    </div>
                </div>
                <div class="panel-footer center">
                    <a data-toggle="tooltip" type="button" class="btn btn-danger"
                        href="{{route('administrador.alumnos', $admin->id)}}">Cancelar</a>
                    <input type="submit" value="Guardar" class="btn btn-success">
                </div>
                <br>
            </form>
        </fieldset>
    </div>
</div>
@endsection