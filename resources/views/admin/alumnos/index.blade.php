<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Escuela Drack/Alumnos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <a href="{{ route('alumnos_crear') }}" class="btn btn-success btn-sm"><i class='fas fa-user-plus' style='font-size:12px'></i> 
                Agregar</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($alumnos as $alumno )
                           <tr>
                               <td>{{ $alumno->id }}</td>
                               <td>{{ $alumno->nombre }}</td>
                               <td>{{ $alumno->edad }}</td>
                               <td>{{ $alumno->direccion }}</td>
                               <td>{{ $alumno->telefono }}</td>
                               <td>{{ $alumno->carrera }}</td>
                               <td>
                                    <a href="{{ route('alumnos_modificar',$alumno->id) }}" class="btn btn-warning btn-sm"><i class='fas fa-user-edit' style='font-size:12px'></i></a>
                                    <a href="{{ route("alumnos_eliminar",$alumno->id) }}" class="btn btn-danger btn-sm">
                                        <i class='fas fa-trash' style='font-size:12px'></i></a>
                                </td>
                           </tr>
                       @endforeach 
                    </tbody>
                </table>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</x-app-layout>
