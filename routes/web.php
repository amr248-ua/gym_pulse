<?php

use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EstadisticasController;
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

// routes/web.php


Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index');


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
Route::get('instalacionesWebmaster', [InstalacionesController::class, 'listadoInstalaciones'])->name('instalacionesWebmaster.showInstalacionesWebmaster');
Route::post('bloquear-instalacion/{id}', [InstalacionesController::class, 'bloquearInstalacion'])->name('bloquear_instalacion');
Route::post('nueva-instalacion', [InstalacionesController::class, 'nuevaInstalacion'])->name('nueva_instalacion');

Route::get('perfil/{id}', [UserController::class, 'showDatos'])->name('perfil');
Route::get('/usuarios/{id}/editar', [UserController::class, 'actualizarDatosView'])->name('perfil.actualizarDatosView');
Route::middleware(['auth'])->group(function () {
    Route::put('/usuarios/{id}/editar', [UserController::class, 'actualizarDatos'])->name('perfil.actualizarDatos');
});
Route::put('/actualizar-saldo/{id}', [UserController::class, 'actualizarSaldo'])
    ->name('actualizarSaldo');
Route::get('recepcionIns', [UserController::class, 'recepcionistaInsView'])->name('recepcionIns.view');
Route::get('recepcionIns', [UserController::class, 'recepcionistaInsViewInstalacion'])->name('recepcionIns.view');
Route::get('recepcion', [UserController::class, 'recepcionistaView'])->name('recepcion.view');

Route::put('actualizar-precio-Instalacion/{id}', [UserController::class, 'actualizarPrecioIns'])->name('actualizar.precioIns');
Route::put('actualizar-precio-Actividad/{id}', [UserController::class, 'actualizarPrecioAct'])->name('actualizar.precioAct');
Route::put('actualizar-precio-tarifa/{id}', [UserController::class, 'actualizarPrecioFee'])->name('actualizar.precioFee');

Route::get('/buscar-usuario', [UserController::class, 'buscarUsuario'])->name('buscarUsuario');

//Rutas de webmaster

Route::get('solicitudes', [UserController::class, 'showSolicitudes'])->name('webmaster.solicitudes');
Route::post('/aprobar-usuario/{id}', [UserController::class, 'aprobarUsuario'])->name('aprobar_usuario');
Route::post('/denegar-usuario/{id}', [UserController::class, 'denegarUsuario'])->name('denegar_usuario');
