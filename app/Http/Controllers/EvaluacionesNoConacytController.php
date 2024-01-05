<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\evaluacionesNoConacyt;
use Illuminate\Support\Facades\Auth;

class EvaluacionesNoConacytController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = evaluacionesNoConacyt::where('user_id', $userId)->get();

                return response()->json($data, 200);
            } else {
                // El usuario no está autenticado
                return response()->json(["error" => "Usuario no autenticado"], 401);
            }
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
                $data["institucion"] = $request["institucion"];
                $data["fecha_inicio"] = $request["fecha_inicio"];
                $data["fecha_fin"] = $request["fecha_fin"];
                $data["cargo"] = $request["cargo"];
                $data["tipo_evaluacion"] = $request["tipo_evaluacion"];
                $data["producto_evaluado"] = $request["producto_evaluado"];
                $data["nombre_producto_evaluado"] = $request["nombre_producto_evaluado"];
                $data["descripcion_actividad"] = $request["descripcion_actividad"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = evaluacionesNoConacyt::create($data);
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
            $data["institucion"] = $request["institucion"];
            $data["fecha_inicio"] = $request["fecha_inicio"];
            $data["fecha_fin"] = $request["fecha_fin"];
            $data["cargo"] = $request["cargo"];
            $data["tipo_evaluacion"] = $request["tipo_evaluacion"];
            $data["producto_evaluado"] = $request["producto_evaluado"];
            $data["nombre_producto_evaluado"] = $request["nombre_producto_evaluado"];
            $data["descripcion_actividad"] = $request["descripcion_actividad"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];

            //se realiza una busqueda por el id y se actualiza
            evaluacionesNoConacyt::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = evaluacionesNoConacyt::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            evaluacionesNoConacyt::find($id)->delete($id);
            $res = evaluacionesNoConacyt::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
