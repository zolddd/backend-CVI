<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\patentes;

class PatentesController extends Controller
{
    public function index()
    {
        try {
            $data = patentes::get();
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
                $data["nombre"] = $request["nombre"];
                $data["tipo_patente"] = $request["tipo_patente"];
                $data["estado_patente"] = $request["estado_patente"];
                $data["numero_tramite"] = $request["numero_tramite"];
                $data["fecha_solicitud"] = $request["fecha_solicitud"];
                $data["fecha_registro"] = $request["fecha_registro"];
                $data["numero_registro"] = $request["numero_registro"];
                $data["expediente"] = $request["expediente"];
                $data["clasificacion_wipo"] = $request["clasificacion_wipo"];
                $data["resumen"] = $request["resumen"];
                $data["explotacion_industrial"] = $request["explotacion_industrial"];
                $data["year_publicacion"] = $request["year_publicacion"];
                $data["pais"] = $request["pais"];
                $data["usuario_benficiario"] = $request["usuario_benficiario"];
                $data["conocimiento_teorico"] = $request["conocimiento_teorico"];
                $data["innovacion_implementada"] = $request["innovacion_implementada"];
                $data["problema_resuelve"] = $request["problema_resuelve"];
                $data["analisis_pertinencia"] = $request["analisis_pertinencia"];
                $data["linea_investigacion"] = $request["linea_investigacion"];
                $data["numero_solicitud"] = $request["numero_solicitud"];
                $data["registro_internacional"] = $request["registro_internacional"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = patentes::create($data);
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
            $data["nombre"] = $request["nombre"];
            $data["tipo_patente"] = $request["tipo_patente"];
            $data["estado_patente"] = $request["estado_patente"];
            $data["numero_tramite"] = $request["numero_tramite"];
            $data["fecha_solicitud"] = $request["fecha_solicitud"];
            $data["fecha_registro"] = $request["fecha_registro"];
            $data["numero_registro"] = $request["numero_registro"];
            $data["expediente"] = $request["expediente"];
            $data["clasificacion_wipo"] = $request["clasificacion_wipo"];
            $data["resumen"] = $request["resumen"];
            $data["explotacion_industrial"] = $request["explotacion_industrial"];
            $data["year_publicacion"] = $request["year_publicacion"];
            $data["pais"] = $request["pais"];
            $data["usuario_benficiario"] = $request["usuario_benficiario"];
            $data["conocimiento_teorico"] = $request["conocimiento_teorico"];
            $data["innovacion_implementada"] = $request["innovacion_implementada"];
            $data["problema_resuelve"] = $request["problema_resuelve"];
            $data["analisis_pertinencia"] = $request["analisis_pertinencia"];
            $data["linea_investigacion"] = $request["linea_investigacion"];
            $data["numero_solicitud"] = $request["numero_solicitud"];
            $data["registro_internacional"] = $request["registro_internacional"];
            //se realiza una busqueda por el id y se actualiza
            patentes::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = patentes::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            patentes::find($id)->delete($id);
            $res = patentes::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
