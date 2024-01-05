<?php

namespace App\Http\Controllers;

use App\Models\redesInvestigacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedesInvestigacionController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = redesInvestigacion::where('user_id', $userId)->get();

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
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = redesInvestigacion::create($data);
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
            redesInvestigacion::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = redesInvestigacion::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            redesInvestigacion::find($id)->delete($id);
            $res = redesInvestigacion::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
