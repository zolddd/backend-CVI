<?php

namespace App\Http\Controllers;

use App\Models\domicilioResidencia;
use Illuminate\Http\Request;

class DomicilioResidenciaController extends Controller
{
    public function index()
    {
        return domicilioResidencia::all();
    }

    public function show(domicilioResidencia $domicilioResidencia)
    {
        return $domicilioResidencia;
    }

    public function store(Request $request)
    {
        $domicilioResidencia = new domicilioResidencia;
        $domicilioResidencia-> Pais  = $request -> Pais ;
        $domicilioResidencia-> Codigo_postal  = $request -> Codigo_postal ;
        $domicilioResidencia-> Estado = $request -> Estado ;
        $domicilioResidencia-> Municipio_delegacion = $request -> Municipio_delegacion ;
        $domicilioResidencia-> Localidad = $request -> Localidad ;
        $domicilioResidencia-> Asentamiento = $request -> Asentamiento ;
        $domicilioResidencia-> Tipo_asentamiento = $request -> Tipo_asentamiento ;
        $domicilioResidencia-> Nombre_asentamiento = $request -> Nombre_asentamiento ;
        $domicilioResidencia-> Carretera = $request -> Carretera ;
        $domicilioResidencia-> Nombre_vialidad = $request -> Nombre_vialidad ;
        $domicilioResidencia-> Parte_numerica1 = $request -> Parte_numerica1 ;
        $domicilioResidencia-> Numero_exterior_anterior = $request -> Numero_exterior_anterior ;
        $domicilioResidencia-> Parte_alfanumerica = $request -> Parte_alfanumerica ;
        $domicilioResidencia-> Parte_numerica2 = $request -> Parte_numerica2 ;
        $domicilioResidencia-> Tipo = $request -> Tipo ;
        $domicilioResidencia-> Nombre = $request -> Nombre ;
        $domicilioResidencia-> Descripcion_ubicacion = $request -> Descripcion_ubicacion;

        $domicilioResidencia->save();
        return $domicilioResidencia;
    }

    public function update(Request $request, domicilioResidencia $domicilioResidencia)
    {
        $domicilioResidencia-> Pais  = $request -> Pais ;
        $domicilioResidencia-> Codigo_postal  = $request -> Codigo_postal ;
        $domicilioResidencia-> Estado = $request -> Estado ;
        $domicilioResidencia-> Municipio_delegacion = $request -> Municipio_delegacion ;
        $domicilioResidencia-> Localidad = $request -> Localidad ;
        $domicilioResidencia-> Asentamiento = $request -> Asentamiento ;
        $domicilioResidencia-> Tipo_asentamiento = $request -> Tipo_asentamiento ;
        $domicilioResidencia-> Nombre_asentamiento = $request -> Nombre_asentamiento ;
        $domicilioResidencia-> Carretera = $request -> Carretera ;
        $domicilioResidencia-> Nombre_vialidad = $request -> Nombre_vialidad ;
        $domicilioResidencia-> Parte_numerica1 = $request -> Parte_numerica1 ;
        $domicilioResidencia-> Numero_exterior_anterior = $request -> Numero_exterior_anterior ;
        $domicilioResidencia-> Parte_alfanumerica = $request -> Parte_alfanumerica ;
        $domicilioResidencia-> Parte_numerica2 = $request -> Parte_numerica2 ;
        $domicilioResidencia-> Tipo = $request -> Tipo ;
        $domicilioResidencia-> Nombre = $request -> Nombre ;
        $domicilioResidencia-> Descripcion_ubicacion = $request -> Descripcion_ubicacion;

        $domicilioResidencia->update();
        return $domicilioResidencia;
    }

    public function destroy(domicilioResidencia $domicilioResidencia)
    {
        $domicilioResidencia->delete();
        return "Eliminado";
    }
}
