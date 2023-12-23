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
use App\Http\Controllers\DiplomadosImpartidosController;
use App\Http\Controllers\CursosImpartidosController;
use App\Http\Controllers\DesarrolloTecnologicoController;
use App\Http\Controllers\InnovaionController;
use App\Http\Controllers\DesarrolloSoftwareController;
use App\Http\Controllers\TesisDirigidaController;
use App\Http\Controllers\ProyectosInvestigacionController;

use App\Http\Controllers\UsuarioController;


Route::apiResource('domicilioResidencia', DomicilioResidenciaController::class)->middleware('auth:sanctum');

//Grado Academico
Route::apiResource('gradoAcademico', GradoAcademicoController::class)->middleware('auth:sanctum');

//Documento Trabajo
Route::apiResource('documentoTrabajo', DocumentoTrabajoController::class)->middleware('auth:sanctum');

//Experiencia Laboral
Route::apiResource('experienciaLaboral', ExperienciaLaboralController::class)->middleware('auth:sanctum');

//ReporteTecnico
Route::apiResource('reporteTecnico', ReporteTecnicoController::class)->middleware('auth:sanctum');


Route::apiResource('domicilioResidencias', DomicilioResidenciaController::class);


//Diplomados Impartidos
Route::apiResource('diplomadosImpartidos', DiplomadosImpartidosController::class)->middleware('auth:sanctum');


//Cursos Impartidos
Route::apiResource('cursosImpartidos', CursosImpartidosController::class)
    ->middleware('auth:sanctum');


//Desarrollo tecnologico
Route::apiResource('desarrolloTecnologico', DesarrolloTecnologicoController::class)->middleware('auth:sanctum');

//Innovaion
Route::apiResource('innovaion', InnovaionController::class)->middleware('auth:sanctum');

//Desarrollo de software
Route::apiResource('desarrolloSoftware', DesarrolloSoftwareController::class)->middleware('auth:sanctum');


//Tesis Dirigida
Route::apiResource('tesisDirigida', TesisDirigidaController::class)->middleware('auth:sanctum');


//Proyectos Investigacion
Route::apiResource('proyectosInvestigacion', ProyectosInvestigacionController::class)->middleware('auth:sanctum');



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
Route::middleware('auth:sanctum')->get('/user', [InformacionGeneralController::class, 'get']);
Route::middleware('auth:sanctum')->put('/user', [InformacionGeneralController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/user', [UsuarioController::class, 'remove']);

// Not especified
Route::any('{any}', function () {
    return response()->json(['message' => 'Route not found'])->setStatusCode(404);
});

