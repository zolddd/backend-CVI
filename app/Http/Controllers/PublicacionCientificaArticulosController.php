<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\publicacionCientificaArticulos;
use Illuminate\Support\Facades\Auth;

class PublicacionCientificaArticulosController extends Controller
{
    public function index()
    {
        try {
            $data = publicacionCientificaArticulos::get();
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
                $data["rol_participacion"] = $request["rol_participacion"];
                $data["estatus_publicacion"] = $request["estatus_publicacion"];
                $data["objetivo"] = $request["objetivo"];
                $data["url_cita"] = $request["url_cita"];
                $data["cita_a"] = $request["cita_a"];
                $data["cita_b"] = $request["cita_b"];
                $data["total_cita"] = $request["total_cita"];

                // Asigna el user_id al nuevo curso impartido
                $data["id_investigador"] = $userId;
                $response = publicacionCientificaArticulos::create($data);
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
            $data["rol_participacion"] = $request["rol_participacion"];
            $data["estatus_publicacion"] = $request["estatus_publicacion"];
            $data["objetivo"] = $request["objetivo"];
            $data["url_cita"] = $request["url_cita"];
            $data["cita_a"] = $request["cita_a"];
            $data["cita_b"] = $request["cita_b"];
            $data["total_cita"] = $request["total_cita"];

            //se realiza una busqueda por el id y se actualiza
            publicacionCientificaArticulos::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = publicacionCientificaArticulos::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            publicacionCientificaArticulos::find($id)->delete($id);
            $res = publicacionCientificaArticulos::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
