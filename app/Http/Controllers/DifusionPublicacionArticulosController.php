<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\difusionPublicacionArticulos;
use Illuminate\Support\Facades\Auth;

class DifusionPublicacionArticulosController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = difusionPublicacionArticulos::where('id_investigador', $userId)->get();

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

                $data["ISSN_impreso"] = $request["ISSN_impreso"];
                $data["ISSN_electronico"] = $request["ISSN_electronico"];
                $data["DOI"] = $request["DOI"];
                $data["nombre_revista"] = $request["nombre_revista"];
                $data["titulo_articulo"] = $request["titulo_articulo"];
                $data["num_revista"] = $request["num_revista"];
                $data["vol_revista"] = $request["vol_revista"];
                $data["year_publicacion"] = $request["year_publicacion"];
                $data["de_pagina"] = $request["de_pagina"];
                $data["a_pagina"] = $request["a_pagina"];
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
                $response = difusionPublicacionArticulos::create($data);
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
            $data["ISSN_impreso"] = $request["ISSN_impreso"];
            $data["ISSN_electronico"] = $request["ISSN_electronico"];
            $data["DOI"] = $request["DOI"];
            $data["nombre_revista"] = $request["nombre_revista"];
            $data["titulo_articulo"] = $request["titulo_articulo"];
            $data["num_revista"] = $request["num_revista"];
            $data["vol_revista"] = $request["vol_revista"];
            $data["year_publicacion"] = $request["year_publicacion"];
            $data["de_pagina"] = $request["de_pagina"];
            $data["a_pagina"] = $request["a_pagina"];
            $data["palabra_clave1"] = $request["palabra_clave1"];
            $data["palabra_clave2"] = $request["palabra_clave2"];
            $data["palabra_clave3"] = $request["palabra_clave3"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];
            $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];

            //se realiza una busqueda por el id y se actualiza
            difusionPublicacionArticulos::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = difusionPublicacionArticulos::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            difusionPublicacionArticulos::find($id)->delete($id);
            $res = difusionPublicacionArticulos::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
