<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ProfesionController;


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
Route::resource('/turno',TurnoController::class);
Route::resource('/profesion',ProfesionController::class);