<?php

namespace App\Http\Controllers;

use App\Models\cursosImpartidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursosImpartidosController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = cursosImpartidos::where('user_id', $userId)->get();

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

                $data["Nombre_curso"] = $request["Nombre_curso"];
                $data["Horas_total"] = $request["Horas_total"];
                $data["Fecha_inicio"] = $request["Fecha_inicio"];
                $data["Fecha_fin"] = $request["Fecha_fin"];
                $data["Nivel_escolaridad"] = $request["Nivel_escolaridad"];
                $data["Area"] = $request["Area"];
                $data["Campo"] = $request["Campo"];
                $data["Disciplina"] = $request["Disciplina"];
                $data["Subdisciplina"] = $request["Subdisciplina"];

                // Asigna el user_id al nuevo curso impartido
                $data["id_investigador"] = $userId;
                $response = cursosImpartidos::create($data);
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
            $data["Nombre_diplomado"] = $request["Nombre_diplomado"];
            $data["Nombre_curso"] = $request["Nombre_curso"];
            $data["AÑO"] = $request["AÑO"];
            $data["Horas_totales"] = $request["Horas_totales"];
            $data["Area"] = $request["Area"];
            $data["Campo"] = $request["Campo"];
            $data["Disciplina"] = $request["Disciplina"];
            $data["Subdisciplina"] = $request["Subdisciplina"];

            //se realiza una busqueda por el id y se actualiza
            cursosImpartidos::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = cursosImpartidos::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            cursosImpartidos::find($id)->delete($id);
            $res = cursosImpartidos::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
