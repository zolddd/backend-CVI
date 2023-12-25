<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\gruposInvestigacion;

class RedesInvestigacionController extends Controller
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
                $data["nombre_red"] = $request["nombre_red"];
                $data["fecha_creacion"] = $request["fecha_creacion"];
                $data["fecha_ingreso"] = $request["fecha_ingreso"];
                $data["nombre_responsable"] = $request["nombre_responsable"];
                $data["primer_apellido_responsable"] = $request["primer_apellido_responsable"];
                $data["segundo_apellido_responsable"] = $request["segundo_apellido_responsable"];
                $data["institucion_adscripcion"] = $request["institucion_adscripcion"];
                $data["total_integrantes"] = $request["total_integrantes"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];
                // Asigna el user_id al nuevo curso impartido
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
            $data["nombre_red"] = $request["nombre_red"];
            $data["fecha_creacion"] = $request["fecha_creacion"];
            $data["fecha_ingreso"] = $request["fecha_ingreso"];
            $data["nombre_responsable"] = $request["nombre_responsable"];
            $data["primer_apellido_responsable"] = $request["primer_apellido_responsable"];
            $data["segundo_apellido_responsable"] = $request["segundo_apellido_responsable"];
            $data["institucion_adscripcion"] = $request["institucion_adscripcion"];
            $data["total_integrantes"] = $request["total_integrantes"];
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
