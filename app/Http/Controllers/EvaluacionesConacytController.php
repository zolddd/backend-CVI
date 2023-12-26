<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\evaluacionesConacyt;
use Illuminate\Support\Facades\Auth;

class EvaluacionesConacytController extends Controller
{
    public function index()
    {
        try {
            $data = evaluacionesConacyt::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }


    public function store(Request $request)
    {
        try {

            if (Auth::check()) {
                // Obtén el ID del usuario autenticado
                $userId = Auth::id();
                $data["nombre_programa"] = $request["nombre_programa"];
                $data["fecha_asignacion"] = $request["fecha_asignacion"];
                $data["fecha_aceptacion"] = $request["fecha_aceptacion"];
                $data["fecha_evaluacion"] = $request["fecha_evaluacion"];
                $data["descripcion"] = $request["descripcion"];
                // Asigna el user_id al nuevo curso impartido
                $data["id_investigador"] = $userId;
                $response = evaluacionesConacyt::create($data);
                return response()->json($response, 200);

            }

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            //data es un array con los datos del request
            $data["nombre_programa"] = $request["nombre_programa"];
            $data["fecha_asignacion"] = $request["fecha_asignacion"];
            $data["fecha_aceptacion"] = $request["fecha_aceptacion"];
            $data["fecha_evaluacion"] = $request["fecha_evaluacion"];
            $data["descripcion"] = $request["descripcion"];

            //se realiza una busqueda por el id y se actualiza
            evaluacionesConacyt::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = evaluacionesConacyt::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            evaluacionesConacyt::find($id)->delete($id);
            $res = evaluacionesConacyt::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
