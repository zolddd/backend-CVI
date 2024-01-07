<?php

namespace App\Http\Controllers;

use App\Models\tesisDirigida;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TesisDirigidaController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = tesisDirigida::where('id_investigador', $userId)->get();

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

                $data["nombre_autor"] = $request["nombre_autor"];
                $data["primer_apellido_autor"] = $request["primer_apellido_autor"];
                $data["segundo_apellido_autor"] = $request["segundo_apellido_autor"];
                $data["grado_academico"] = $request["grado_academico"];
                $data["rol_participacion"] = $request["rol_participacion"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];

                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = tesisDirigida::create($data);
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
            $data["nombre_autor"] = $request["nombre_autor"];
            $data["primer_apellido_autor"] = $request["primer_apellido_autor"];
            $data["segundo_apellido_autor"] = $request["segundo_apellido_autor"];
            $data["grado_academico"] = $request["grado_academico"];
            $data["rol_participacion"] = $request["rol_participacion"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];

            //se realiza una busqueda por el id y se actualiza
            tesisDirigida::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = tesisDirigida::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        try {

            tesisDirigida::find($id)->delete($id);
            $res = tesisDirigida::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
