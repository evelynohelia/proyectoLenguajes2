<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ProfesionController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\AuthController;

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

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login'] );
    Route::post('register', [AuthController::class, 'register'] );

});

Route::apiResource('/citas',CitaController::class);
Route::apiResource('/personas',PersonaController::class)->middleware('auth:api');
Route::apiResource('/clientes',ClienteController::class);
Route::apiResource('/profesionales',ProfesionalController::class);
Route::apiResource('/servicios',ServicioController::class);
Route::apiResource('/turnos', TurnoController::class);

Route::get('/turnos/profesionales/{id}',[TurnoController::class,'buscarTurnoProfesional'])->name('turnosProf');
Route::apiResource('/profesion',ProfesionController::class);
//Route::apiResource('/profesion_profesional',Profesion_profesionalController::class);
Route::get('/profRecomendados',[ProfesionalController::class,'get3Personas'])->name('profRecomendados');
Route::get('/personaProfesional/{id}',[ProfesionalController::class,'getPersonsaProfesional'])->name('personaProfesional');
Route::get('/cliente/citas/{id}', [CitaController::class, 'getCitasAgendadasCliente'] );
Route::get('/profesional/citas/{id}', [CitaController::class, 'getCitasAgendadasProfesional'] );
Route::get('/buscarNombre/{nombre}',[ProfesionalController::class,'getBusquedaNombre'])->name('personaProfesional');
Route::post('/cliente/citasDelete/{cita}',[CitaController::class,'deleteCitaCliente'])->name('personaProfesional');
Route::post('/profesional/citasDelete/{cita}',[CitaController::class,'deleteCitaProfesional'])->name('personaProfesional');
Route::post('/changeStatusCitas/{cita}',[CitaController::class,'changeStatus'])->name('personaProfesional');

