<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyectosInvestigacion;
use Illuminate\Support\Facades\Auth;

class ProyectosInvestigacionController extends Controller
{
    public function index()
    {
        try {
            $data = proyectosInvestigacion::get();
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

                $data["nombre_proyecto"] = $request["nombre_proyecto"];
                $data["tipo_proyecto"] = $request["tipo_proyecto"];
                $data["inicio"] = $request["inicio"];
                $data["fin"] = $request["fin"];
                $data["institucion"] = $request["institucion"];
                $data["logro_proyecto"] = $request["logro_proyecto"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];

                // Asigna el user_id al nuevo curso impartido
                $data["id_investigador"] = $userId;
                $response = proyectosInvestigacion::create($data);
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
            $data["nombre_proyecto"] = $request["nombre_proyecto"];
            $data["tipo_proyecto"] = $request["tipo_proyecto"];
            $data["inicio"] = $request["inicio"];
            $data["fin"] = $request["fin"];
            $data["institucion"] = $request["institucion"];
            $data["logro_proyecto"] = $request["logro_proyecto"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];

            //se realiza una busqueda por el id y se actualiza
            proyectosInvestigacion::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = proyectosInvestigacion::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            proyectosInvestigacion::find($id)->delete($id);
            $res = proyectosInvestigacion::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
