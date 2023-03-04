<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\AdministradorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('alumnos.log');
})->name('alumnos_log');
Route::get('/alumnos/sesion', 'SesionController@alumnos')->name('alumnos.sesion');

Route::get('/asesores/log', function () {
    return view('asesores.log');
})->name('asesores_log');
Route::get('/asesores/sesion', 'SesionController@asesores')->name('asesores.sesion');

Route::get('/administrador/log', function () {
    return view('administrador.log');
})->name('administrador_log');
Route::post('/administrador/sesion', 'SesionController@administrador')->name('administrador.sesion');

//alumnos
Route::prefix('alumnos')->group(function () {
    Route::get('/alumnos/index', 'AlumnosController@index')->name('alumnos.index');
    Route::get('/alumnos/perfil/{no_cont}', 'AlumnosController@perfil')->name('alumnos.perfil');
    Route::get('/alumnos/edperfil/{id}', 'AlumnosController@edit')->name('alumnos.edperfil');
    Route::get('/alumnos/edperfil/guardar/{id}', 'AlumnosController@update')->name('alumnos.edperfil.guardar');
    Route::get('//foto/{id}', 'AlumnosController@foto')->name('alumnos.foto');
    Route::post('/alumnos/foto/guardar/{id}', 'AlumnosController@updatefoto')->name('alumnos.foto.guardar');
    Route::get('/alumnos/asesores/{id}', 'AlumnosController@asesores')->name('alumnos.asesores');
    Route::get('/alumnos/veras/{id}/{idas}', 'AlumnosController@veras')->name('alumnos.veras');
    //comentarios
    Route::get('/alumnos/comentarios/{id}/{idas}', 'AlumnosController@comentarios')->name('alumnos.comentarios');
    Route::get('/alumnos/editarcomen/guardar/{id}/{idas}/{idcom}', 'AlumnosController@updatecomen')->name('alumnos.editarcomen.guardar');
    Route::get('/alumnos/eliminarcomen/{id}/{idas}/{idcom}', 'AlumnosController@eliminarcomen')->name('alumnos.eliminarcomen');
});

//asesores
Route::prefix('asesores')->group(function () {
    Route::get('/asesores/pdf/{id}', 'AsesoresController@pdf')->name('asesores.pdf');
    Route::get('/asesores/index', 'AsesoresController@index')->name('asesores.index');
    Route::get('/asesores/perfil/{no_cont}', 'AsesoresController@perfil')->name('asesores.perfil');
    Route::get('/asesores/edperfil/{id}', 'AsesoresController@edit')->name('asesores.edperfil');
    Route::get('/asesores/edperfil/guardar/{id}', 'AsesoresController@update')->name('asesores.edperfil.guardar');
    Route::get('/asesores/foto/{id}', 'AsesoresController@foto')->name('asesores.foto');
    Route::post('/asesores/foto/guardar/{id}', 'AsesoresController@updatefoto')->name('asesores.foto.guardar');
    Route::get('/asesores/reportes/{id}', 'AsesoresController@reportes')->name('asesores.reportes');
    Route::get('/asesores/crearre/{id}', 'AsesoresController@crearre')->name('asesores.crearre');
    Route::get('/asesores/guardarre/{id}', 'AsesoresController@guardarre')->name('asesores.guardarre');
    Route::get('/asesores/editarre/{id}/{idas}', 'AsesoresController@editarre')->name('asesores.editarre');
    Route::get('/asesores/editarre/guardar/{id}/{idas}', 'AsesoresController@updatere')->name('asesores.editarre.guardar');
    Route::get('/asesores/eliminarre/{id}/{idal}', 'AsesoresController@eliminarre')->name('asesores.eliminarre');

    Route::get('/asesores/comentarios/{id}', 'AsesoresController@comentarios')->name('asesores.comentarios');
});


//Admin
Route::prefix('administrador')->group(function () {
    Route::get('/administrador/index', 'AdministradorController@index')->name('administrador.index');
    Route::get('/administrador/perfil/{matricula}', 'AdministradorController@perfil')->name('administrador.perfil');
    Route::get('/administrador/edperfil/{id}', 'AdministradorController@edit')->name('administrador.edperfil');
    Route::get('/administrador/edperfil/guardar/{id}', 'AdministradorController@update')->name('administrador.edperfil.guardar');
    Route::get('/administrador/foto/{id}', 'AdministradorController@foto')->name('administrador.foto');
    Route::post('/administrador/foto/guardar/{id}', 'AdministradorController@updatefoto')->name('administrador.foto.guardar');

    Route::get('/administrador/alumnos/{id}', 'AdministradorController@alumnos')->name('administrador.alumnos');
    Route::get('/administrador/crearal/{id}', 'AdministradorController@crearal')->name('administrador.crearal');
    Route::get('/administrador/guardaral/{id}', 'AdministradorController@guardaral')->name('administrador.guardaral');
    Route::get('/administrador/editaral/{id}/{idal}', 'AdministradorController@editaral')->name('administrador.editaral');
    Route::get('/administrador/editaral/guardar/{id}/{idal}', 'AdministradorController@updateal')->name('administrador.editaral.guardar');
    Route::get('/administrador/eliminaral/{id}/{idal}', 'AdministradorController@eliminaral')->name('administrador.eliminaral');

    Route::get('/administrador/asesores/{id}', 'AdministradorController@asesores')->name('administrador.asesores');
    Route::get('/administrador/crearas/{id}', 'AdministradorController@crearas')->name('administrador.crearas');
    Route::get('/administrador/guardaras/{id}', 'AdministradorController@guardaras')->name('administrador.guardaras');
    Route::get('/administrador/editaras/{id}/{idas}', 'AdministradorController@editaras')->name('administrador.editaras');
    Route::get('/administrador/editaras/guardar/{id}/{idas}', 'AdministradorController@updateas')->name('administrador.editaras.guardar');
    Route::get('/administrador/eliminaras/{id}/{idas}', 'AdministradorController@eliminaras')->name('administrador.eliminaras');

    Route::get('/administrador/comentarios/{id}', 'AdministradorController@comentarios')->name('administrador.comentarios');
    Route::get('/administrador/eliminarcomen/{id}/{idcom}', 'AdministradorController@eliminarcomen')->name('administrador.eliminarcomen');
});
