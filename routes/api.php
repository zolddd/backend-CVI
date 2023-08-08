<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\DomicilioResidenciaController;
use App\Http\Controllers\GradoAcademicoController;
use App\Http\Controllers\DocumentoTrabajoController;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\ReporteTecnicoController;
=======

use App\Http\Controllers\UsuarioController;
>>>>>>> a056a56d754865d327d489a973dd6dc384601950

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<<<<<<< HEAD
Route::apiResource('domicilioResidencia',DomicilioResidenciaController::class);//ya
Route::apiResource('gradoAcademico',GradoAcademicoController::class);//ya
Route::apiResource('documentoTrabajo',DocumentoTrabajoController::class);//ya
Route::apiResource('experienciaLaboral',ExperienciaLaboralController::class);//ya
Route::apiResource('reporteTecnico',ReporteTecnicoController::class);


=======
Route::apiResource('domicilioResidencias',DomicilioResidenciaController::class);
Route::post("/login",[UsuarioController::class, 'login']);
Route::post("/register",[UsuarioController::class, 'register']);
>>>>>>> a056a56d754865d327d489a973dd6dc384601950

Route::any("{any}",function(){return response()->json(["message"=>"Route not found"])->setStatusCode(404);});