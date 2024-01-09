<?php

namespace App\Http\Controllers;

use App\Models\domicilioResidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomicilioResidenciaController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = domicilioResidencia::where('id_investigador', $userId)->get();

                return response()->json($data, 200);
            } else {
                // El usuario no está autenticado
                return response()->json(["error" => "Usuario no autenticado"], 401);
            }
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()], 500);
        }
    }

    public function show(domicilioResidencia $domicilioResidencia)
    {
        return $domicilioResidencia;
    }

    public function store(Request $request)
    {

        if (Auth::check()) {
            $userId = Auth::id();
            $domicilioResidencia = new domicilioResidencia;
            $domicilioResidencia->Pais = $request->Pais;
            $domicilioResidencia->Codigo_postal = $request->Codigo_postal;
            $domicilioResidencia->Nombre_asentamiento = $request->Nombre_asentamiento;
            $domicilioResidencia->Estado = $request->Estado;
            $domicilioResidencia->Municipio_delegacion = $request->Municipio_delegacion;
            $domicilioResidencia->Localidad = $request->Localidad;
            $domicilioResidencia->Asentamiento = $request->Asentamiento;
            $domicilioResidencia->Tipo_asentamiento = $request->Tipo_asentamiento;
            $domicilioResidencia->Carretera = $request->Carretera;
            $domicilioResidencia->Nombre_vialidad = $request->Nombre_vialidad;
            $domicilioResidencia->Sin_numero = $request->Sin_numero;
            $domicilioResidencia->Parte_numerica = $request->Parte_numerica;
            $domicilioResidencia->parte_numerica_interior = $request->parte_numerica_interior;
            $domicilioResidencia->Numero_exterior_anterior = $request->Numero_exterior_anterior;
            $domicilioResidencia->Parte_alfanumerica = $request->Parte_alfanumerica;
            $domicilioResidencia->Parte_alfanumerica_interior = $request->Parte_alfanumerica_interior;
            $domicilioResidencia->Tipo = $request->Tipo;
            $domicilioResidencia->Nombre = $request->Nombre;
            $domicilioResidencia->Descripcion_ubicacion = $request->Descripcion_ubicacion;
            $domicilioResidencia->id_investigador = $userId;
            $domicilioResidencia->save();
        }

        return response()->json($domicilioResidencia, 200);
    }

    public function update(Request $request, $id)
    {
        $domicilioResidencia = domicilioResidencia::find($id);

        if (!$domicilioResidencia) {
            return response()->json('No se encontró ', 404);
        }

        $domicilioResidencia->Pais = $request->Pais;
        $domicilioResidencia->Codigo_postal = $request->Codigo_postal;
        $domicilioResidencia->Nombre_asentamiento = $request->Nombre_asentamiento;
        $domicilioResidencia->Estado = $request->Estado;
        $domicilioResidencia->Municipio_delegacion = $request->Municipio_delegacion;
        $domicilioResidencia->Localidad = $request->Localidad;
        $domicilioResidencia->Asentamiento = $request->Asentamiento;
        $domicilioResidencia->Tipo_asentamiento = $request->Tipo_asentamiento;
        $domicilioResidencia->Carretera = $request->Carretera;
        $domicilioResidencia->Nombre_vialidad = $request->Nombre_vialidad;
        $domicilioResidencia->Sin_numero = $request->Sin_numero;
        $domicilioResidencia->Parte_numerica = $request->Parte_numerica;
        $domicilioResidencia->parte_numerica_interior = $request->parte_numerica_interior;
        $domicilioResidencia->Numero_exterior_anterior = $request->Numero_exterior_anterior;
        $domicilioResidencia->Parte_alfanumerica = $request->Parte_alfanumerica;
        $domicilioResidencia->Parte_alfanumerica_interior = $request->Parte_alfanumerica_interior;
        $domicilioResidencia->Tipo = $request->Tipo;
        $domicilioResidencia->Nombre = $request->Nombre;
        $domicilioResidencia->Descripcion_ubicacion = $request->Descripcion_ubicacion;

        $domicilioResidencia->update();
        return response()->json($domicilioResidencia, 200);
    }

    public function destroy($id)
    {
        $domicilioResidencia = domicilioResidencia::find($id);

        if (!$domicilioResidencia) {
            return response()->json('No se encontró ', 404);
        }

        $domicilioResidencia->delete();
        return response()->json('Eliminado correctamente', 200);
    }

}
