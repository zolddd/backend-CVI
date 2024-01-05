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
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = desarrolloTecnologico::where('user_id', $userId)->get();

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

                $data["Nombre_desarrollo"] = $request["Nombre_desarrollo"];
                $data["Tipo_desarrollo"] = $request["Tipo_desarrollo"];
                $data["Documentos_respaldo"] = $request["Documentos_respaldo"];
                $data["Objetivo"] = $request["Objetivo"];
                $data["Resumen"] = $request["Resumen"];
                $data["Rol"] = $request["Rol"];
                $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];
                $data["Sector_SCIAN"] = $request["Sector_SCIAN"];
                $data["Subsector_SCIAN"] = $request["Subsector_SCIAN"];
                $data["Rama_SCIAN"] = $request["Rama_SCIAN"];
                $data["Subrama_SCIAN"] = $request["Subrama_SCIAN"];
                $data["Clase_SCIAN"] = $request["Clase_SCIAN"];
                $data["Sector_OCDE"] = $request["Sector_OCDE"];
                $data["Division_OCDE"] = $request["Division_OCDE"];
                $data["Grupo_OCDE"] = $request["Grupo_OCDE"];
                $data["Clase_OCDE"] = $request["Clase_OCDE"];
                $data["Area"] = $request["Area"];
                $data["Campo"] = $request["Campo"];
                $data["Disciplina"] = $request["Disciplina"];
                $data["Subdisciplina"] = $request["Subdisciplina"];
                $data["Generacion_valor"] = $request["Generacion_valor"];
                $data["Formacion_RRHH"] = $request["Formacion_RRHH"];
                $data["Id_usuario_beneficiario"] = $request["Id-Id_usuario_beneficiario"];
                $data["Aplicacion_conocimeinto"] = $request["Aplicacion_conocimeinto"];
                $data["Teorico_practico_original"] = $request["Teorico_practico_original"];
                $data["Id_innvacion_implementado"] = $request["Id_innvacion_implementado"];
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
            $data["apoyo_CONACYT"] = $request["apoyo_CONACYT"];
            $data["Sector_SCIAN"] = $request["Sector_SCIAN"];
            $data["Subsector_SCIAN"] = $request["Subsector_SCIAN"];
            $data["Rama_SCIAN"] = $request["Rama_SCIAN"];
            $data["Subrama_SCIAN"] = $request["Subrama_SCIAN"];
            $data["Clase_SCIAN"] = $request["Clase_SCIAN"];
            $data["Sector_OCDE"] = $request["Sector_OCDE"];
            $data["Division_OCDE"] = $request["Division_OCDE"];
            $data["Grupo_OCDE"] = $request["Grupo_OCDE"];
            $data["Clase_OCDE"] = $request["Clase_OCDE"];
            $data["Area"] = $request["Area"];
            $data["Campo"] = $request["Campo"];
            $data["Disciplina"] = $request["Disciplina"];
            $data["Subdisciplina"] = $request["Subdisciplina"];
            $data["Generacion_valor"] = $request["Generacion_valor"];
            $data["Formacion_RRHH"] = $request["Formacion_RRHH"];
            $data["Id_usuario_beneficiario"] = $request["Id-Id_usuario_beneficiario"];
            $data["Aplicacion_conocimeinto"] = $request["Aplicacion_conocimeinto"];
            $data["Teorico_practico_original"] = $request["Teorico_practico_original"];
            $data["Id_innvacion_implementado"] = $request["Id_innvacion_implementado"];
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
