<?php

namespace App\Http\Controllers;

use App\Models\documentoTrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DocumentoTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return documentoTrabajo::all();
    }

    /**
     * Store a newly created resource in storage.
     */   

    public function store(Request $request)
    {
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'Titulo_documento' => 'required|string|max:25',
            'Nombre_autor' => 'required|string|max:20',
            'Primer_Apellido_Autor' => 'required|string|max:20',
            'Segundo_Apellido_Autor' => 'nullable|string|max:20',
            'Paginas' => 'required|string|max:5',
            'Palabras_claves' => 'required|string|max:25',
            'Titulo_publicacion' => 'required|string|max:25',
            'Año_Publicacion' => 'required|date',
            'Area' => 'required|string|max:25',
            'Campo' => 'required|string|max:25',
            'Disciplina' => 'required|string|max:25',
            'Subdisciplina' => 'required|string|max:25',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Crear una nueva instancia del modelo y asignar los valores de los campos.
        $documentoTrabajo = new documentoTrabajo;
        $documentoTrabajo->Titulo_documento = $request->input('Titulo_documento');
        $documentoTrabajo->Nombre_autor = $request->input('Nombre_autor');
        $documentoTrabajo->Primer_Apellido_Autor = $request->input('Primer_Apellido_Autor');
        $documentoTrabajo->Segundo_Apellido_Autor = $request->input('Segundo_Apellido_Autor');
        $documentoTrabajo->Paginas = $request->input('Paginas');
        $documentoTrabajo->Palabras_claves = $request->input('Palabras_claves');
        $documentoTrabajo->Titulo_publicacion = $request->input('Titulo_publicacion');
        $documentoTrabajo->Año_Publicacion = $request->input('Año_Publicacion');
        $documentoTrabajo->Area = $request->input('Area');
        $documentoTrabajo->Campo = $request->input('Campo');
        $documentoTrabajo->Disciplina = $request->input('Disciplina');
        $documentoTrabajo->Subdisciplina = $request->input('Subdisciplina');

        $documentoTrabajo->save();

        // Devolver el objeto creado en la respuesta.
        //return response()->json(['data' => $documentoTrabajo], 201);
        return response()->json($documentoTrabajo);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(documentoTrabajo $documentoTrabajo)
    {
        return $documentoTrabajo;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Verificar si el registro con el ID especificado existe
        $documentoTrabajo =  documentoTrabajo::find($id);

        if (! $documentoTrabajo) {
            return response()->json('No se encontró', 404);
        }
        // Validar la solicitud
        $validator = Validator::make($request->all(), [
            'Titulo_documento' => 'required|string|max:25',
            'Nombre_autor' => 'required|string|max:20',
            'Primer_Apellido_Autor' => 'required|string|max:20',
            'Segundo_Apellido_Autor' => 'nullable|string|max:20',
            'Paginas' => 'required|string|max:5',
            'Palabras_claves' => 'required|string|max:25',
            'Titulo_publicacion' => 'required|string|max:25',
            'Año_Publicacion' => 'required|date',
            'Area' => 'required|string|max:25',
            'Campo' => 'required|string|max:25',
            'Disciplina' => 'required|string|max:25',
            'Subdisciplina' => 'required|string|max:25',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $documentoTrabajo->Titulo_documento = $request->input('Titulo_documento');
        $documentoTrabajo->Nombre_autor = $request->input('Nombre_autor');
        $documentoTrabajo->Primer_Apellido_Autor = $request->input('Primer_Apellido_Autor');
        $documentoTrabajo->Segundo_Apellido_Autor = $request->input('Segundo_Apellido_Autor');
        $documentoTrabajo->Paginas = $request->input('Paginas');
        $documentoTrabajo->Palabras_claves = $request->input('Palabras_claves');
        $documentoTrabajo->Titulo_publicacion = $request->input('Titulo_publicacion');
        $documentoTrabajo->Año_Publicacion = $request->input('Año_Publicacion');
        $documentoTrabajo->Area = $request->input('Area');
        $documentoTrabajo->Campo = $request->input('Campo');
        $documentoTrabajo->Disciplina = $request->input('Disciplina');
        $documentoTrabajo->Subdisciplina = $request->input('Subdisciplina');

        $documentoTrabajo->update();

        // Devolver el objeto creado en la respuesta.
        //return response()->json(['data' => $documentoTrabajo], 201);
        return response()->json($documentoTrabajo);
    }
        /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $documentoTrabajo = documentoTrabajo::find($id);

        if (!$documentoTrabajo) {
            return response()->json('No se encontró ', 404);
        }
    
        $documentoTrabajo->delete();
        return response()->json('Eliminado correctamente', 200);
    }
    
}
