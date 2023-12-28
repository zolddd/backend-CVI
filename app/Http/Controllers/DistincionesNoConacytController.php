<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\distincionesNoConacyt;

class DistincionesNoConacytController extends Controller
{
    public function index()
    {
        try {
            $data = distincionesNoConacyt::get();
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
                $data["nombre_distincion"] = $request["nombre_distincion"];
                $data["institucion"] = $request["institucion"];
                $data["year"] = $request["year"];
                $data["pais"] = $request["pais"];
                $data["descripcion_distincion"] = $request["descripcion_distincion"];
                /// Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = distincionesNoConacyt::create($data);
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
            $data["nombre_distincion"] = $request["nombre_distincion"];
            $data["institucion"] = $request["institucion"];
            $data["year"] = $request["year"];
            $data["pais"] = $request["pais"];
            $data["descripcion_distincion"] = $request["descripcion_distincion"];
            //se realiza una busqueda por el id y se actualiza
            distincionesNoConacyt::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = distincionesNoConacyt::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            distincionesNoConacyt::find($id)->delete($id);
            $res = distincionesNoConacyt::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
