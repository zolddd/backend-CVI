<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\difusionPublicacionLibros;
use Illuminate\Support\Facades\Auth;

class DifusionPublicacionLibrosController extends Controller
{
    public function index()
    {
        try {
            $data = difusionPublicacionLibros::get();
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
                $data["ISBN"] = $request["ISBN"];
                $data["titulo_libro"] = $request["titulo_libro"];
                $data["pais"] = $request["pais"];
                $data["idioma"] = $request["idioma"];
                $data["year_publicacion"] = $request["year_publicacion"];
                $data["volumen"] = $request["volumen"];
                $data["tomo"] = $request["tomo"];
                $data["tiraje"] = $request["tiraje"];
                $data["numero_paginas"] = $request["numero_paginas"];
                $data["palabra_clave1"] = $request["palabra_clave1"];
                $data["palabra_clave2"] = $request["palabra_clave2"];
                $data["palabra_clave3"] = $request["palabra_clave3"];
                $data["editorial"] = $request["editorial"];
                $data["numero_edicion"] = $request["numero_edicion"];
                $data["year_edicion"] = $request["year_edicion"];
                $data["ISBN_traducido"] = $request["ISBN_traducido"];
                $data["titulo_traducido"] = $request["titulo_traducido"];
                $data["idioma_traducido"] = $request["idioma_traducido"];
                $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];

                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = difusionPublicacionLibros::create($data);
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
            $data["ISBN"] = $request["ISBN"];
            $data["titulo_libro"] = $request["titulo_libro"];
            $data["pais"] = $request["pais"];
            $data["idioma"] = $request["idioma"];
            $data["year_publicacion"] = $request["year_publicacion"];
            $data["volumen"] = $request["volumen"];
            $data["tomo"] = $request["tomo"];
            $data["tiraje"] = $request["tiraje"];
            $data["numero_paginas"] = $request["numero_paginas"];
            $data["palabra_clave1"] = $request["palabra_clave1"];
            $data["palabra_clave2"] = $request["palabra_clave2"];
            $data["palabra_clave3"] = $request["palabra_clave3"];
            $data["editorial"] = $request["editorial"];
            $data["numero_edicion"] = $request["numero_edicion"];
            $data["year_edicion"] = $request["year_edicion"];
            $data["ISBN_traducido"] = $request["ISBN_traducido"];
            $data["titulo_traducido"] = $request["titulo_traducido"];
            $data["idioma_traducido"] = $request["idioma_traducido"];
            $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];

            //se realiza una busqueda por el id y se actualiza
            difusionPublicacionLibros::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = difusionPublicacionLibros::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            difusionPublicacionLibros::find($id)->delete($id);
            $res = difusionPublicacionLibros::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
