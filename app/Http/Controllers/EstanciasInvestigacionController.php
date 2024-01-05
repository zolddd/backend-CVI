<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estanciasInvestigacion;
use Illuminate\Support\Facades\Auth;

class EstanciasInvestigacionController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = estanciasInvestigacion::where('user_id', $userId)->get();

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

                $data["institucion"] = $request["institucion"];
                $data["nombre_estancia"] = $request["nombre_estancia"];
                $data["inicio"] = $request["inicio"];
                $data["fin"] = $request["fin"];
                $data["tipo_estancia"] = $request["tipo_estancia"];
                $data["logro_profesional"] = $request["logro_profesional"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];

                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = estanciasInvestigacion::create($data);
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
            $data["institucion"] = $request["institucion"];
            $data["nombre_estancia"] = $request["nombre_estancia"];
            $data["inicio"] = $request["inicio"];
            $data["fin"] = $request["fin"];
            $data["tipo_estancia"] = $request["tipo_estancia"];
            $data["logro_profesional"] = $request["logro_profesional"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];

            //se realiza una busqueda por el id y se actualiza
            estanciasInvestigacion::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = estanciasInvestigacion::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            estanciasInvestigacion::find($id)->delete($id);
            $res = estanciasInvestigacion::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
