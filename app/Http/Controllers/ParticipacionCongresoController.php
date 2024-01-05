<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\participacionCongreso;

class ParticipacionCongresoController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = participacionCongreso::where('user_id', $userId)->get();

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

                $data["nombre_congreso"] = $request["nombre_congreso"];
                $data["titulo_trabajo"] = $request["titulo_trabajo"];
                $data["participacion_congreso"] = $request["participacion_congreso"];
                $data["pais"] = $request["pais"];
                $data["fecha"] = $request["fecha"];
                $data["palabra_clave1"] = $request["palabra_clave1"];
                $data["palabra_clave2"] = $request["palabra_clave2"];
                $data["palabra_clave3"] = $request["palabra_clave3"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = participacionCongreso::create($data);
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
            $data["nombre_congreso"] = $request["nombre_congreso"];
            $data["titulo_trabajo"] = $request["titulo_trabajo"];
            $data["participacion_congreso"] = $request["participacion_congreso"];
            $data["pais"] = $request["pais"];
            $data["fecha"] = $request["fecha"];
            $data["palabra_clave1"] = $request["palabra_clave1"];
            $data["palabra_clave2"] = $request["palabra_clave2"];
            $data["palabra_clave3"] = $request["palabra_clave3"];

            //se realiza una busqueda por el id y se actualiza
            participacionCongreso::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = participacionCongreso::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            participacionCongreso::find($id)->delete($id);
            $res = participacionCongreso::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
