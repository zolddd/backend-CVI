<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\gruposInvestigacion;

class GruposInvestigacionController extends Controller
{
    public function index()
    {
        try {
            $data = gruposInvestigacion::get();
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

                $data["nombre_grupo"] = $request["nombre_grupo"];
                $data["fecha_creacion"] = $request["fecha_creacion"];
                $data["fecha_ingreso"] = $request["fecha_ingreso"];
                $data["nombre_lider"] = $request["nombre_lider"];
                $data["primer_apellido_lider"] = $request["primer_apellido_lider"];
                $data["segundo_apellido_lider"] = $request["segundo_apellido_lider"];
                $data["institucion_adscripcion"] = $request["institucion_adscripcion"];
                $data["total_investigadores"] = $request["total_investigadores"];
                $data["colaboracion"] = $request["colaboracion"];
                $data["impacto"] = $request["impacto"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = gruposInvestigacion::create($data);
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
            $data["nombre_grupo"] = $request["nombre_grupo"];
            $data["fecha_creacion"] = $request["fecha_creacion"];
            $data["fecha_ingreso"] = $request["fecha_ingreso"];
            $data["nombre_lider"] = $request["nombre_lider"];
            $data["primer_apellido_lider"] = $request["primer_apellido_lider"];
            $data["segundo_apellido_lider"] = $request["segundo_apellido_lider"];
            $data["institucion_adscripcion"] = $request["institucion_adscripcion"];
            $data["total_investigadores"] = $request["total_investigadores"];
            $data["colaboracion"] = $request["colaboracion"];
            $data["impacto"] = $request["impacto"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];

            //se realiza una busqueda por el id y se actualiza
            gruposInvestigacion::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = gruposInvestigacion::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            gruposInvestigacion::find($id)->delete($id);
            $res = gruposInvestigacion::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
