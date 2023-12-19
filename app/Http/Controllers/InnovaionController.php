<?php
namespace App\Http\Controllers;

use App\Models\innovaion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InnovaionController extends Controller
{
    
    public function index()
    {
        try {
            $data = innovaion::get();
            return response()->json($data,200);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()],500);
        }
    }

   
    public function store(Request $request)
    {
        try {
            if (Auth::check()) {
                // Obtén el ID del usuario autenticado
                $userId = Auth::id();
                $data["Nombre"] = $request["Nombre"];
                $data["Fecha_fin"] = $request["Fecha_fin"];
                $data["Descripcion"] = $request["Descripcion"];
                $data["Tipo_innovacion"] = $request["Tipo_innovacion"];
                $data["Tipo_innovacion_OSLO"] = $request["Tipo_innovacion_OSLO"];
                $data["PP_intelectual"] = $request["PP_intelectual"];
                $data["Potencial_cobertura"] = $request["Potencial_cobertura"];
                $data["Area"] = $request["Area"];
                $data["Campo"] = $request["Campo"];
                $data["Disciplina"] = $request["Disciplina"];
                $data["Subdisciplina"] = $request["Subdisciplina"];
                $data["Monto_venta"] = $request["Monto_venta"];
                $data["Volumen_produccion"] = $request["Volumen_produccion"];
                $data["Empleados_directos"] = $request["Empleados_directos"];
                $data["Empleados_indirectos"] = $request["Empleados_indirectos"];
                $data["Usuario_beneficiario"] = $request["Usuario_beneficiario"];
                $data["Generacion_conocimiento_tp"] = $request["Generacion_conocimiento_tp"];
                $data["Innovacion_Implementada"] = $request["Innovacion_Implementada"];
                $data["Problema_resuelve"] = $request["Problema_resuelve"];
                $data["Analisis_pertinencia"] = $request["Analisis_pertinencia"];
                $data["Linea_investigacion"] = $request["Linea_investigacion"];
                $data["Generacion_valor"] = $request["Generacion_valor"];
                // Asigna el user_id a la inovacion
                $data["id_investigador"] = $userId;
                $response = innovaion::create($data);
                return response()->json($response,200);
            }
           
            
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()],500);
        }
    }

    
    public function update(Request $request,$id)
    {
        try {
            //data es un array con los datos del request
            $data["Nombre"] = $request["Nombre"];
            $data["Fecha_fin"] = $request["Fecha_fin"];
            $data["Descripcion"] = $request["Descripcion"];
            $data["Tipo_innovacion"] = $request["Tipo_innovacion"];
            $data["Tipo_innovacion_OSLO"] = $request["Tipo_innovacion_OSLO"];
            $data["PP_intelectual"] = $request["PP_intelectual"];
            $data["Potencial_cobertura"] = $request["Potencial_cobertura"];
            $data["Area"] = $request["Area"];
            $data["Campo"] = $request["Campo"];
            $data["Disciplina"] = $request["Disciplina"];
            $data["Subdisciplina"] = $request["Subdisciplina"];
            $data["Monto_venta"] = $request["Monto_venta"];
            $data["Volumen_produccion"] = $request["Volumen_produccion"];
            $data["Empleados_directos"] = $request["Empleados_directos"];
            $data["Empleados_indirectos"] = $request["Empleados_indirectos"];
            $data["Usuario_beneficiario"] = $request["Usuario_beneficiario"];
            $data["Generacion_conocimiento_tp"] = $request["Generacion_conocimiento_tp"];
            $data["Innovacion_Implementada"] = $request["Innovacion_Implementada"];
            $data["Problema_resuelve"] = $request["Problema_resuelve"];
            $data["Analisis_pertinencia"] = $request["Analisis_pertinencia"];
            $data["Linea_investigacion"] = $request["Linea_investigacion"];
            $data["Generacion_valor"] = $request["Generacion_valor"];

            //se realiza una busqueda por el id y se actualiza
            innovaion::find($id)->update($data);

            //se retorna el objecto ya actualizado traido de la bd
            $response = innovaion::find($id);

            return response()->json($response,200);
            
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()],500);
        }
    }

    
    public function destroy($id)
    {
        try {
            innovaion::find($id)->delete($id);
            $res = innovaion::find($id);
            return response()->json("Delete successfully",200);     
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()],500);
        }
    }
}
