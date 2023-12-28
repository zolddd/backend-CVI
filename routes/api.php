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
use App\Http\Controllers\EstanciasInvestigacionController;
use App\Http\Controllers\PublicacionCientificaArticulosController;
use App\Http\Controllers\ParticipacionCongresoController;
use App\Http\Controllers\GruposInvestigacionController;
use App\Http\Controllers\PublicacionCientificaLibrosController;
use App\Http\Controllers\EvaluacionesConacytController;
use App\Http\Controllers\EvaluacionesNoConacytController;
use App\Http\Controllers\DocumentosTrabajoController;
use App\Http\Controllers\RedesTematicasController;
use App\Http\Controllers\DistincionesConacytController;
use App\Http\Controllers\DistincionesNoConacytController;
use App\Http\Controllers\PatentesController;
use App\Http\Controllers\MemoriasController;
use App\Http\Controllers\DivulgacionController;
use App\Http\Controllers\OtraFormacionController;
use App\Http\Controllers\DifusionPublicacionArticulosController;
use App\Http\Controllers\DifusionPublicacionLibrosController;
use App\Http\Controllers\IdiomasController;
use App\Http\Controllers\LenguasIndigenasController;
use App\Http\Controllers\CertificacionesMedicasController;
use App\Http\Controllers\DifusionCapitulosPublicadosController;
use App\Http\Controllers\ReviewsController;

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


//estancias Investigacion
Route::apiResource('estanciasInvestigacion', EstanciasInvestigacionController::class)->middleware('auth:sanctum');


//Publicacion Cientifica de Articulos
Route::apiResource('publicacionCientificaArticulos', PublicacionCientificaArticulosController::class)->middleware('auth:sanctum');


//participacion congreso
Route::apiResource('participacionCongreso', ParticipacionCongresoController::class)->middleware('auth:sanctum');

//grupos Investigacion
Route::apiResource('gruposInvestigacion', GruposInvestigacionController::class)->middleware('auth:sanctum');


//Publicacion Cientifica de libros
Route::apiResource('publicacionCientificaLibros', PublicacionCientificaLibrosController::class)->middleware('auth:sanctum');


//Evaluaciones Conacyt
Route::apiResource('evaluacionesConacyt', EvaluacionesConacytController::class)->middleware('auth:sanctum');


//Evaluaciones NO Conacyt
Route::apiResource('evaluacionesNoConacyt', EvaluacionesNoConacytController::class)->middleware('auth:sanctum');


//Documentos de trabajo
Route::apiResource('documentosTrabajo', DocumentosTrabajoController::class)->middleware('auth:sanctum');


//Redes Temáticas CONACYT
Route::apiResource('redesTematicas', RedesTematicasController::class)->middleware('auth:sanctum');



//Distinciones CONACYT
Route::apiResource('distincionesConacyt', DistincionesConacytController::class)->middleware('auth:sanctum');


//Distinciones NO CONACYT
Route::apiResource('distincionesNoConacyt', DistincionesNoConacytController::class)->middleware('auth:sanctum');

//patentes
Route::apiResource('patentes', PatentesController::class)->middleware('auth:sanctum');


//memorias
Route::apiResource('memorias', MemoriasController::class)->middleware('auth:sanctum');


//Divulgacion
Route::apiResource('divulgacion', DivulgacionController::class)->middleware('auth:sanctum');

//Otra Formacion
Route::apiResource('otraFormacion', OtraFormacionController::class)->middleware('auth:sanctum');

//difusion Publicacion Articulos
Route::apiResource('difusionPublicacionArticulos', DifusionPublicacionArticulosController::class)->middleware('auth:sanctum');

//difusion Publicacion Libros
Route::apiResource('difusionPublicacionLibros', DifusionPublicacionLibrosController::class)->middleware('auth:sanctum');

//idiomas
Route::apiResource('idiomas', IdiomasController::class)->middleware('auth:sanctum');


//lenguas Indigenas
Route::apiResource('lenguasIndigenas', LenguasIndigenasController::class)->middleware('auth:sanctum');


//Certificaciones Medicas
Route::apiResource('certificacionesMedicas', CertificacionesMedicasController::class)->middleware('auth:sanctum');

//Difusion Capitulos Publicados
Route::apiResource('difusionCapitulosPublicados', DifusionCapitulosPublicadosController::class)->middleware('auth:sanctum');

//Reviews
Route::apiResource('reviews', ReviewsController::class)->middleware('auth:sanctum');




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

