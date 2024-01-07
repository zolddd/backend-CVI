<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\difusionCapitulosPublicados;

class DifusionCapitulosPublicadosController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = difusionCapitulosPublicados::where('id_investigador', $userId)->get();

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
                $data["editorial"] = $request["editorial"];
                $data["numero_edicion"] = $request["numero_edicion"];
                $data["year_publicacion"] = $request["year_publicacion"];
                $data["titulo_capitulo"] = $request["titulo_capitulo"];
                $data["numero_capitulo"] = $request["numero_capitulo"];
                $data["de_pagina"] = $request["de_pagina"];
                $data["a_pagina"] = $request["a_pagina"];
                $data["resumen"] = $request["resumen"];
                $data["area"] = $request["area"];
                $data["campo"] = $request["campo"];
                $data["disciplina"] = $request["disciplina"];
                $data["subdisciplina"] = $request["subdisciplina"];
                $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];

                // Asigna el user_id 
                $data["id_investigador"] = $userId;
                $response = difusionCapitulosPublicados::create($data);
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
            $userId = Auth::id();
            $data["ISBN"] = $request["ISBN"];
            $data["titulo_libro"] = $request["titulo_libro"];
            $data["editorial"] = $request["editorial"];
            $data["numero_edicion"] = $request["numero_edicion"];
            $data["year_publicacion"] = $request["year_publicacion"];
            $data["titulo_capitulo"] = $request["titulo_capitulo"];
            $data["numero_capitulo"] = $request["numero_capitulo"];
            $data["de_pagina"] = $request["de_pagina"];
            $data["a_pagina"] = $request["a_pagina"];
            $data["resumen"] = $request["resumen"];
            $data["area"] = $request["area"];
            $data["campo"] = $request["campo"];
            $data["disciplina"] = $request["disciplina"];
            $data["subdisciplina"] = $request["subdisciplina"];
            $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];
            //se realiza una busqueda por el id y se actualiza
            difusionCapitulosPublicados::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = difusionCapitulosPublicados::find($id);
            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            difusionCapitulosPublicados::find($id)->delete($id);
            $res = difusionCapitulosPublicados::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
