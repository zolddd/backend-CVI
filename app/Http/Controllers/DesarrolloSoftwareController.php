<?php

namespace App\Http\Controllers;

use App\Models\desarrolloSoftware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesarrolloSoftwareController extends Controller
{

    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = desarrolloSoftware::where('user_id', $userId)->get();

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
                $data["Titulo"] = $request["Titulo"];
                $data["Tipo_desarrollo"] = $request["Tipo_desarrollo"];
                $data["Derechos_autor"] = $request["Derechos_autor"];
                $data["Pais"] = $request["Pais"];
                $data["Derechos_Autor2"] = $request["Derechos_Autor2"];
                $data["Pais2"] = $request["Pais2"];
                $data["Horas_hombre"] = $request["Horas_hombre"];
                $data["Fecha_Inicio"] = $request["Fecha_Inicio"];
                $data["Fecha_fin"] = $request["Fecha_fin"];
                $data["Costo"] = $request["Costo"];
                $data["Rol_participacion"] = $request["Rol_participacion"];
                $data["Beneficiario"] = $request["Beneficiario"];
                $data["Objectivo"] = $request["Objectivo"];
                $data["Resumen"] = $request["Resumen"];
                $data["Contribucion"] = $request["Contribucion"];
                $data["Generacion_valor"] = $request["Generacion_valor"];
                $data["Formacion_RRRHH"] = $request["Formacion_RRRHH"];
                $data["Logros"] = $request["Logros"];
                $data["Generacion_conocimiento_tp"] = $request["Generacion_conocimiento_tp"];
                $data["Identificacion_innocacion_imple"] = $request["Identificacion_innocacion_imple"];
                $data["Problema_resuelve"] = $request["Problema_resuelve"];
                $data["Analisi_pertinencia"] = $request["Analisi_pertinencia"];
                $data["Linea_investigacion"] = $request["Linea_investigacion"];

                // Asigna el user_id al nuevo desarollo
                $data["id_investigador"] = $userId;
                $response = desarrolloSoftware::create($data);
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
            $data["Titulo"] = $request["Titulo"];
            $data["Tipo_desarrollo"] = $request["Tipo_desarrollo"];
            $data["Derechos_autor"] = $request["Derechos_autor"];
            $data["Pais"] = $request["Pais"];
            $data["Derechos_Autor2"] = $request["Derechos_Autor2"];
            $data["Pais2"] = $request["Pais2"];
            $data["Horas_hombre"] = $request["Horas_hombre"];
            $data["Fecha_Inicio"] = $request["Fecha_Inicio"];
            $data["Fecha_fin"] = $request["Fecha_fin"];
            $data["Costo"] = $request["Costo"];
            $data["Rol_participacion"] = $request["Rol_participacion"];
            $data["Beneficiario"] = $request["Beneficiario"];
            $data["Objectivo"] = $request["Objectivo"];
            $data["Resumen"] = $request["Resumen"];

            $data["Contribucion"] = $request["Contribucion"];

            $data["Generacion_valor"] = $request["Generacion_valor"];
            $data["Formacion_RRRHH"] = $request["Formacion_RRRHH"];
            $data["Logros"] = $request["Logros"];
            $data["Generacion_conocimiento_tp"] = $request["Generacion_conocimiento_tp"];
            $data["Identificacion_innocacion_imple"] = $request["Identificacion_innocacion_imple"];
            $data["Problema_resuelve"] = $request["Problema_resuelve"];
            $data["Analisi_pertinencia"] = $request["Analisi_pertinencia"];
            $data["Linea_investigacion"] = $request["Linea_investigacion"];

            //se realiza una busqueda por el id y se actualiza
            desarrolloSoftware::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = desarrolloSoftware::find($id);

            return response()->json($response, 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        try {

            desarrolloSoftware::find($id)->delete($id);
            $res = desarrolloSoftware::find($id);
            return response()->json("Delete successfully", 200);

        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }
}
