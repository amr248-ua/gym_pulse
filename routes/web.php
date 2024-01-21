<?php

use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
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



Route::get('/acerca-de', [AboutController::class, 'index'])->name('about');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('actividades', [ActividadesController::class, 'showActividades'])->name('actividades.showActividades');
Route::get('actividades/{id}', [ActividadesController::class, 'showActividad'])->name('actividad');
Route::post('reservarActividadRecepcionista', [ActividadesController::class, 'actividadRecepcionista'])->name('actividad.actividadRecepcionista');
Route::post('reservarActividad', [ActividadesController::class, 'reservarActividad'])->name('actividad.reservarActividad');

Route::get('instalaciones', [InstalacionesController::class, 'showInstalaciones'])->name('instalaciones.showInstalaciones');
Route::get('instalaciones/{id}', [InstalacionesController::class, 'showInstalacion'])->name('instalacion');
Route::post('reservarInstalacionRecepcionista', [InstalacionesController::class, 'instalacionRecepcionista'])->name('instalacion.instalacionRecepcionista');
Route::post('reservarInstalacion', [InstalacionesController::class, 'reservarInstalacion'])->name('instalacion.reservarInstalacion');

Route::get('perfil/{id}', [UserController::class, 'showDatos'])->name('perfil');
Route::get('/usuarios/{id}/editar', [UserController::class, 'actualizarDatosView'])->name('perfil.actualizarDatosView');
Route::middleware(['auth'])->group(function () {
    Route::put('/usuarios/{id}/editar', [UserController::class, 'actualizarDatos'])->name('perfil.actualizarDatos');
});
Route::put('/actualizar-saldo/{id}', [UserController::class, 'actualizarSaldo'])
    ->name('actualizarSaldo');
Route::get('recepcion', [UserController::class, 'recepcionistaView'])->name('recepcion.view');

Route::get('/buscar-usuario', [UserController::class, 'buscarUsuario'])->name('buscarUsuario');

//Rutas de webmaster

Route::get('solicitudes', [UserController::class, 'showSolicitudes'])->name('webmaster.solicitudes');