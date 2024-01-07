<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\certificacionesMedicas;
use Illuminate\Support\Facades\Auth;

class CertificacionesMedicasController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = certificacionesMedicas::where('id_investigador', $userId)->get();

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
                $data["folio"] = $request["folio"];
                $data["consejo"] = $request["consejo"];
                $data["especialidad"] = $request["especialidad"];
                $data["vigencia_de"] = $request["vigencia_de"];
                $data["vigencia_a"] = $request["vigencia_a"];
                $data["tipo_certificacion"] = $request["tipo_certificacion"];

                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = certificacionesMedicas::create($data);
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
            $userId = Auth::id();
            $data["folio"] = $request["folio"];
            $data["consejo"] = $request["consejo"];
            $data["especialidad"] = $request["especialidad"];
            $data["vigencia_de"] = $request["vigencia_de"];
            $data["vigencia_a"] = $request["vigencia_a"];
            $data["tipo_certificacion"] = $request["tipo_certificacion"];


            //se realiza una busqueda por el id y se actualiza
            certificacionesMedicas::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = certificacionesMedicas::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            certificacionesMedicas::find($id)->delete($id);
            $res = certificacionesMedicas::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
