<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\divulgacion;

class DivulgacionController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = divulgacion::where('id_investigador', $userId)->get();

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
                $data["titulo_trabajo"] = $request["titulo_trabajo"];
                $data["tipo_participacion"] = $request["tipo_participacion"];
                $data["tipo_evento"] = $request["tipo_evento"];
                $data["institucion_organizadora"] = $request["institucion_organizadora"];
                $data["dirigido_a"] = $request["dirigido_a"];
                $data["fecha"] = $request["fecha"];
                $data["tipo_divulgacion"] = $request["tipo_divulgacion"];
                $data["tipo_medio"] = $request["tipo_medio"];
                $data["palabra_clave1"] = $request["palabra_clave1"];
                $data["palabra_clave2"] = $request["palabra_clave2"];
                $data["palabra_clave3"] = $request["palabra_clave3"];
                $data["notas"] = $request["notas"];
                $data["producto_obtenido"] = $request["producto_obtenido"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = divulgacion::create($data);
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
            $data["titulo_trabajo"] = $request["titulo_trabajo"];
            $data["tipo_participacion"] = $request["tipo_participacion"];
            $data["tipo_evento"] = $request["tipo_evento"];
            $data["institucion_organizadora"] = $request["institucion_organizadora"];
            $data["dirigido_a"] = $request["dirigido_a"];
            $data["fecha"] = $request["fecha"];
            $data["tipo_divulgacion"] = $request["tipo_divulgacion"];
            $data["tipo_medio"] = $request["tipo_medio"];
            $data["palabra_clave1"] = $request["palabra_clave1"];
            $data["palabra_clave2"] = $request["palabra_clave2"];
            $data["palabra_clave3"] = $request["palabra_clave3"];
            $data["notas"] = $request["notas"];
            $data["producto_obtenido"] = $request["producto_obtenido"];
            //se realiza una busqueda por el id y se actualiza
            divulgacion::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = divulgacion::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            divulgacion::find($id)->delete($id);
            $res = divulgacion::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
