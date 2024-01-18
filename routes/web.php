<?php

use App\Http\Controllers\InstalacionesController;
use App\Http\Controllers\ActividadesController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('instalaciones', [InstalacionesController::class, 'showInstalaciones'])->name('instalaciones.showInstalaciones');

Route::get('actividades', [ActividadesController::class, 'showActividades'])->name('actividades.showActividades');
Route::get('instalaciones/{id}', [InstalacionesController::class, 'showInstalacion'])->name('instalacion');
