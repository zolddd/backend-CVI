<?php

namespace App\Http\Controllers;

use App\Models\desarrolloTecnologico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesarrolloTecnologicoController extends Controller
{

    public function index()
    {
        try {
            $data = desarrolloTecnologico::get();
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

                $data["Nombre_desarrollo"] = $request["Nombre_desarrollo"];
                $data["Tipo_desarrollo"] = $request["Tipo_desarrollo"];
                $data["Documentos_respaldo"] = $request["Documentos_respaldo"];
                $data["Objetivo"] = $request["Objetivo"];
                $data["Resumen"] = $request["Resumen"];
                $data["Rol"] = $request["Rol"];
                $data["Area"] = $request["Area"];
                $data["Campo"] = $request["Campo"];
                $data["Disciplina"] = $request["Disciplina"];
                $data["Subdisciplina"] = $request["Subdisciplina"];

                $data["Generacion_valor"] = $request["Generacion_valor"];
                $data["Formacion_RRHH"] = $request["Formacion_RRHH"];
                $data["Id-Usuario_beneficiario"] = $request["Id-Usuario_beneficiario"];
                $data["Aplicacion_conocimeinto"] = $request["Aplicacion_conocimeinto"];
                $data["Teorico-practico_original"] = $request["Teorico-practico_original"];
                $data["Id-Innvacion_implementado"] = $request["Id-Innvacion_implementado"];
                $data["Problema_resuelve"] = $request["Problema_resuelve"];
                $data["Analisis_pertenencia"] = $request["Analisis_pertenencia"];
                $data["Linea_investigacion"] = $request["Linea_investigacion"];

                // Asigna el user_id al desarollo
                $data["id_investigador"] = $userId;

                // // Asigna el id_innovacion al desarollo
                // $data["id_innovacion"] = $request["id_innovacion"];

                $response = desarrolloTecnologico::create($data);

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
            $data["Nombre_desarrollo"] = $request["Nombre_desarrollo"];
            $data["Tipo_desarrollo"] = $request["Tipo_desarrollo"];
            $data["Documentos_respaldo"] = $request["Documentos_respaldo"];
            $data["Objetivo"] = $request["Objetivo"];
            $data["Resumen"] = $request["Resumen"];
            $data["Rol"] = $request["Rol"];
            $data["Area"] = $request["Area"];
            $data["Campo"] = $request["Campo"];
            $data["Disciplina"] = $request["Disciplina"];
            $data["Subdisciplina"] = $request["Subdisciplina"];

            $data["Generacion_valor"] = $request["Generacion_valor"];
            $data["Formacion_RRHH"] = $request["Formacion_RRHH"];
            $data["Id.Usuario_beneficiario"] = $request["Id.Usuario_beneficiario"];
            $data["Aplicacion_conocimeinto"] = $request["Aplicacion_conocimeinto"];
            $data["Teorico-practico_original"] = $request["Teorico-practico_original"];
            $data["Id.Innvacion_implementado"] = $request["Id.Innvacion_implementado"];
            $data["Problema_resuelve"] = $request["Problema_resuelve"];
            $data["Analisis_pertenencia"] = $request["Analisis_pertenencia"];
            $data["Linea_investigacion"] = $request["Linea_investigacion"];

            //se realiza una busqueda por el id y se actualiza
            desarrolloTecnologico::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = desarrolloTecnologico::find($id);

            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            desarrolloTecnologico::find($id)->delete($id);
            $res = desarrolloTecnologico::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
