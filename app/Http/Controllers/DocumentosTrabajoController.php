<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\documentosTrabajo;
use Illuminate\Support\Facades\Auth;

class DocumentosTrabajoController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = documentosTrabajo::where('user_id', $userId)->get();

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
                $data["titulo_documento_trabajo"] = $request["titulo_documento_trabajo"];
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
                $response = documentosTrabajo::create($data);
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
            $data["titulo_documento_trabajo"] = $request["titulo_documento_trabajo"];
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
            documentosTrabajo::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = documentosTrabajo::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            documentosTrabajo::find($id)->delete($id);
            $res = documentosTrabajo::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
