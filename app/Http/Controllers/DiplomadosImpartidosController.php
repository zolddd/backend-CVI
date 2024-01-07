<?php

namespace App\Http\Controllers;

use App\Models\diplomadosImpartidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiplomadosImpartidosController extends Controller
{

    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = diplomadosImpartidos::where('id_investigador', $userId)->get();

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
                $data["Nombre_diplomado"] = $request["Nombre_diplomado"];
                $data["Nombre_curso"] = $request["Nombre_curso"];
                $data["AÑO"] = $request["AÑO"];
                $data["Horas_totales"] = $request["Horas_totales"];
                $data["Area"] = $request["Area"];
                $data["Campo"] = $request["Campo"];
                $data["Disciplina"] = $request["Disciplina"];
                $data["Subdisciplina"] = $request["Subdisciplina"];

                // Asigna el user_id al nuevo diplomado impartido
                $data["id_investigador"] = $userId;

                $response = diplomadosImpartidos::create($data);

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
            diplomadosImpartidos::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = diplomadosImpartidos::find($id);

            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            diplomadosImpartidos::find($id)->delete($id);
            $res = diplomadosImpartidos::find($id);

            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }


    public function show(diplomadosImpartidos $diplomadosImpartidos)
    {
        //
    }



}
