<?php

use App\Http\Controllers\MedioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

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

Route::apiResource('domicilioResidencias',DomicilioResidenciaController::class);
Route::post("/login",[UsuarioController::class, 'login']);
Route::post("/register",[UsuarioController::class, 'register']);

Route::middleware('auth:sanctum')->post("/medios",[MedioController::class, 'record']);
Route::middleware('auth:sanctum')->get("/medios",[MedioController::class, 'list']);

Route::any("{any}",function(){return response()->json(["message"=>"Route not found"])->setStatusCode(404);});