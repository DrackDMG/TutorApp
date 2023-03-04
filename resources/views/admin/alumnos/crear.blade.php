<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Escuela Daniel/Alumnos/Crear') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="{{ route('alumnos_guardar') }}" method="get">
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Nombre</span>
                        </div>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Edad</span>
                        </div>
                        <input type="number" min="0" max="120" class="form-control" name="edad">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Direcion</span>
                        </div>
                        <input type="text" class="form-control" name="direccion">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Telefono</span>
                        </div>
                        <input type="tel" class="form-control" name="telefono">
                    </div>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Carrera</span>
                        </div>
                        <select class="form-control" id="sel1" name="carrera">
                            <option value="">Selecciona una carrera</option>
                            <option value="sistemas">Sistemas</option>
                            <option value="tics">Tics</option>
                          </select>
                    </div>
                    <input type="submit" value="Guardar" class="btn btn-success
                     btn-sm">
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</x-app-layout>
