<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\publicacionCientificaLibros;

class PublicacionCientificaLibrosController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = publicacionCientificaLibros::where('id_investigador', $userId)->get();

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
                $data["ISBN"] = $request["ISBN"];
                $data["titulo_libro"] = $request["titulo_libro"];
                $data["pais"] = $request["pais"];
                $data["idioma"] = $request["idioma"];
                $data["year_publicacion"] = $request["year_publicacion"];
                $data["volumen"] = $request["volumen"];
                $data["tomo"] = $request["tomo"];
                $data["tiraje"] = $request["tiraje"];
                $data["DOI"] = $request["DOI"];
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
                $data["rol_participacion"] = $request["rol_participacion"];
                $data["estatus_publicacion"] = $request["estatus_publicacion"];
                $data["objetivo"] = $request["objetivo"];
                $data["dictaminado"] = $request["dictaminado"];
                $data["url_cita"] = $request["url_cita"];
                $data["cita_a"] = $request["cita_a"];
                $data["cita_b"] = $request["cita_b"];
                $data["total_citas"] = $request["total_citas"];
                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = publicacionCientificaLibros::create($data);
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
            $data["DOI"] = $request["DOI"];
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
            $data["rol_participacion"] = $request["rol_participacion"];
            $data["estatus_publicacion"] = $request["estatus_publicacion"];
            $data["objetivo"] = $request["objetivo"];
            $data["dictaminado"] = $request["dictaminado"];
            $data["url_cita"] = $request["url_cita"];
            $data["cita_a"] = $request["cita_a"];
            $data["cita_b"] = $request["cita_b"];
            $data["total_citas"] = $request["total_citas"];

            //se realiza una busqueda por el id y se actualiza
            publicacionCientificaLibros::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = publicacionCientificaLibros::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            publicacionCientificaLibros::find($id)->delete($id);
            $res = publicacionCientificaLibros::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
