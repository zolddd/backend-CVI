<?php

use App\Http\Controllers\MedioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomicilioResidenciaController;
use App\Http\Controllers\GradoAcademicoController;
use App\Http\Controllers\DocumentoTrabajoController;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\InformacionGeneralController;
use App\Http\Controllers\ReporteTecnicoController;

use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'api' middleware group. Make something great!
|
*/

/* ----------------------------- Laravel-kristell ----------------------------- */

Route::apiResource('domicilioResidencia', DomicilioResidenciaController::class);
Route::apiResource('gradoAcademico', GradoAcademicoController::class);
Route::apiResource('documentoTrabajo', DocumentoTrabajoController::class);
Route::apiResource('experienciaLaboral', ExperienciaLaboralController::class);
Route::apiResource('reporteTecnico', ReporteTecnicoController::class);

Route::apiResource('domicilioResidencias', DomicilioResidenciaController::class);

/* -------------------------------- Researcher -------------------------------- */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return response()->json($request->user()->info);
// });

// Authentication
Route::post('/login', [UsuarioController::class, 'login']);
Route::post('/register', [UsuarioController::class, 'register']);
Route::middleware('auth:sanctum')->put('/credential', [UsuarioController::class, 'update']);

// Medio
Route::middleware('auth:sanctum')->post('/medios', [MedioController::class, 'record']);
Route::middleware('auth:sanctum')->get('/medios', [MedioController::class, 'list']);
Route::middleware('auth:sanctum')->put('/medios/{id}', [MedioController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/medios/{id}', [MedioController::class, 'remove']);

// Usuarios (Información general)
Route::middleware('auth:sanctum')->get('/user',[InformacionGeneralController::class, 'get']);
Route::middleware('auth:sanctum')->put('/user',[InformacionGeneralController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/user',[UsuarioController::class, 'remove']);

// Not especified
Route::any('{any}', function () {
    return response()->json(['message' => 'Route not found'])->setStatusCode(404);
});
