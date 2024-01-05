<?php

namespace App\Http\Controllers;

use App\Models\documentoTrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class DocumentoTrabajoController extends Controller
{

    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = documentoTrabajo::where('user_id', $userId)->get();

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

        if (Auth::check()) {
            // Obtén el ID del usuario autenticado
            $userId = Auth::id();
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

            $documentoTrabajo->id_investigador = $userId;
            $documentoTrabajo->save();
            return response()->json($documentoTrabajo, 200);
        }
    }


    public function show(documentoTrabajo $documentoTrabajo)
    {
        return response()->json($documentoTrabajo, 200);
    }

    
    public function update(Request $request, $id)
    {
        // Verificar si el registro con el ID especificado existe
        $documentoTrabajo = documentoTrabajo::find($id);

        if (!$documentoTrabajo) {
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

        return response()->json($documentoTrabajo, 200);
    }
   
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
