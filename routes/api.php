<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomicilioResidenciaController;
use App\Http\Controllers\GradoAcademicoController;
use App\Http\Controllers\DocumentoTrabajoController;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\ReporteTecnicoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::apiResource('domicilioResidencia',DomicilioResidenciaController::class);//ya
Route::apiResource('gradoAcademico',GradoAcademicoController::class);//ya
Route::apiResource('documentoTrabajo',DocumentoTrabajoController::class);//ya
Route::apiResource('experienciaLaboral',ExperienciaLaboralController::class);
Route::apiResource('reporteTecnico',ReporteTecnicoController::class);



