<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\distincionesConacyt;

class DistincionesConacytController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = distincionesConacyt::where('user_id', $userId)->get();

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
                $data["nombre_distincion"] = $request["nombre_distincion"];
                $data["year"] = $request["year"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = distincionesConacyt::create($data);
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
            $data["year"] = $request["year"];
            //se realiza una busqueda por el id y se actualiza
            distincionesConacyt::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = distincionesConacyt::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            distincionesConacyt::find($id)->delete($id);
            $res = distincionesConacyt::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
