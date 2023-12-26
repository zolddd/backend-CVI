<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\redesTematicas;

class RedesTematicasController extends Controller
{
    public function index()
    {
        try {
            $data = redesTematicas::get();
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
                $data["red_tematica"] = $request["red_tematica"];
                $data["fecha_ingreso"] = $request["fecha_ingreso"];
                // Asigna el user_id al nuevo curso impartido
                $data["id_investigador"] = $userId;
                $response = redesTematicas::create($data);
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
            $data["red_tematica"] = $request["red_tematica"];
            $data["fecha_ingreso"] = $request["fecha_ingreso"];
            //se realiza una busqueda por el id y se actualiza
            redesTematicas::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = redesTematicas::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            redesTematicas::find($id)->delete($id);
            $res = redesTematicas::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
