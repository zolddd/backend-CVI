<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\otraFormacion;

class OtraFormacionController extends Controller
{
    public function index()
    {
        try {
            $data = otraFormacion::get();
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
                $data["formacion_continua"] = $request["formacion_continua"];
                $data["nombre"] = $request["nombre"];
                $data["institucion"] = $request["institucion"];
                $data["year"] = $request["year"];
                $data["horas_totales"] = $request["horas_totales"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = otraFormacion::create($data);
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
            $data["formacion_continua"] = $request["formacion_continua"];
            $data["nombre"] = $request["nombre"];
            $data["institucion"] = $request["institucion"];
            $data["year"] = $request["year"];
            $data["horas_totales"] = $request["horas_totales"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];

            //se realiza una busqueda por el id y se actualiza
            otraFormacion::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = otraFormacion::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            otraFormacion::find($id)->delete($id);
            $res = otraFormacion::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
