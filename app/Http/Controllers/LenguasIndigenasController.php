<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lenguasIndigenas;
use Illuminate\Support\Facades\Auth;

class LenguasIndigenasController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = lenguasIndigenas::where('id_investigador', $userId)->get();

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
                $data["lengua"] = $request["lengua"];
                $data["grado_dominio"] = $request["grado_dominio"];
                $data["nivel_conversacion"] = $request["nivel_conversacion"];
                $data["nivel_lectura"] = $request["nivel_lectura"];
                $data["nivel_escritura"] = $request["nivel_escritura"];
                $data["certificacion"] = $request["certificacion"];
                $data["fecha_evaluacion"] = $request["fecha_evaluacion"];
                $data["documento_probatorio"] = $request["documento_probatorio"];
                $data["vigencia_de"] = $request["vigencia_de"];
                $data["vigencia_a"] = $request["vigencia_a"];
                $data["puntos"] = $request["puntos"];
  
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = lenguasIndigenas::create($data);
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
            $data["lengua"] = $request["lengua"];
            $data["grado_dominio"] = $request["grado_dominio"];
            $data["nivel_conversacion"] = $request["nivel_conversacion"];
            $data["nivel_lectura"] = $request["nivel_lectura"];
            $data["nivel_escritura"] = $request["nivel_escritura"];
            $data["certificacion"] = $request["certificacion"];
            $data["fecha_evaluacion"] = $request["fecha_evaluacion"];
            $data["documento_probatorio"] = $request["documento_probatorio"];
            $data["vigencia_de"] = $request["vigencia_de"];
            $data["vigencia_a"] = $request["vigencia_a"];
            $data["puntos"] = $request["puntos"];

            //se realiza una busqueda por el id y se actualiza
            lenguasIndigenas::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = lenguasIndigenas::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            lenguasIndigenas::find($id)->delete($id);
            $res = lenguasIndigenas::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
