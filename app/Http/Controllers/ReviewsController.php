<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reviews;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function index()
    {
        try {
            $data = reviews::get();
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
                $data["titulo"] = $request["titulo"];
                $data["nombre"] = $request["nombre"];
                $data["primer_apellido"] = $request["primer_apellido"];
                $data["segundo_apellido"] = $request["segundo_apellido"];
                $data["titulo_publicacion"] = $request["titulo_publicacion"];
                $data["de_pagina"] = $request["de_pagina"];
                $data["a_pagina"] = $request["a_pagina"];
                $data["year_publicacion"] = $request["year_publicacion"];
                $data["pais"] = $request["pais"];
                $data["palabra_clave1"] = $request["palabra_clave1"];
                $data["palabra_clave2"] = $request["palabra_clave2"];
                $data["palabra_clave3"] = $request["palabra_clave3"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];
                $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];

                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = reviews::create($data);
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
            $data["titulo"] = $request["titulo"];
            $data["nombre"] = $request["nombre"];
            $data["primer_apellido"] = $request["primer_apellido"];
            $data["segundo_apellido"] = $request["segundo_apellido"];
            $data["titulo_publicacion"] = $request["titulo_publicacion"];
            $data["de_pagina"] = $request["de_pagina"];
            $data["a_pagina"] = $request["a_pagina"];
            $data["year_publicacion"] = $request["year_publicacion"];
            $data["pais"] = $request["pais"];
            $data["palabra_clave1"] = $request["palabra_clave1"];
            $data["palabra_clave2"] = $request["palabra_clave2"];
            $data["palabra_clave3"] = $request["palabra_clave3"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];
            $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];
            //se realiza una busqueda por el id y se actualiza
            reviews::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = reviews::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            reviews::find($id)->delete($id);
            $res = reviews::find($id);
            return response()->json("Delete successfully", 200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
