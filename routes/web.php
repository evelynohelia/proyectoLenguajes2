<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TurnoController;

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
Route::resource('/citas',CitaController::class);
Route::resource('/personas',PersonaController::class);
Route::resource('/clientes',ClienteController::class);
Route::resource('/profesionales',ProfesionalController::class);
Route::resource('/servicios',ServicioController::class);
Route::resource('/turno',TurnoController::class);
Route::resource('/profesion',ProfesionController::class);
Route::resource('/profesion_profesional',Profesion_profesionalController::class);