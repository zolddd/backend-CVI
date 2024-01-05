<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\idiomas;
use Illuminate\Support\Facades\Auth;

class IdiomasController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = idiomas::where('user_id', $userId)->get();

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
                $data["idioma"] = $request["idioma"];
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
                $data["nivel"] = $request["nivel"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = idiomas::create($data);
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
            $data["idioma"] = $request["idioma"];
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
            $data["nivel"] = $request["nivel"];

            //se realiza una busqueda por el id y se actualiza
            idiomas::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = idiomas::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            idiomas::find($id)->delete($id);
            $res = idiomas::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
