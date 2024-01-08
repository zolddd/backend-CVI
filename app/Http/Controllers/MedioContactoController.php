<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medioContacto;
use Illuminate\Support\Facades\Auth;

class MedioContactoController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = medioContacto::where('id_investigador', $userId)->get();

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
                $data["medio_contacto"] = $request["medio_contacto"];
                $data["categoria_contacto"] = $request["categoria_contacto"];
                $data["valor"] = $request["valor"];
                $data["principal"] = $request["principal"];

                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = medioContacto::create($data);
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
            $data["medio_contacto"] = $request["medio_contacto"];
            $data["categoria_contacto"] = $request["categoria_contacto"];
            $data["valor"] = $request["valor"];
            $data["principal"] = $request["principal"];

            //se realiza una busqueda por el id y se actualiza
            medioContacto::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = medioContacto::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            medioContacto::find($id)->delete($id);
            $res = medioContacto::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
