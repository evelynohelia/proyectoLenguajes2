<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ServicioController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/citas',CitaController::class);
Route::resource('/personas',PersonaController::class);
Route::resource('/clientes',ClienteController::class);
Route::resource('/profesionales',ProfesionalController::class);
Route::resource('/servicios',ServicioController::class);
Route::get('/profRecomendados',[ProfesionalController::class,'get3Personas'])->name('profRecomendados');
Route::get('/personaProfesional/{id}',[ProfesionalController::class,'getPersonsaProfesional'])->name('personaProfesional');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
