<?php

namespace App\Http\Controllers;

use App\Models\reporteTecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteTecnicoController extends Controller
{
    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = reporteTecnico::where('id_investigador', $userId)->get();

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

        // Valida los datos del formulario (opcional)
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:25',
            'institucion' => 'required|string',
            'fecha_entrega' => 'required|date',
            'fecha_publicacion' => 'required|date',
            'nombramiento' => 'required|string|max:25',
            'numero_paginas' => 'required|string',
            'origen' => 'required|string|max:15',
            'descripcion' => 'required|string',
            'objetivos' => 'required|string',
            'palabras_claves' => 'required|string',
        ]);

        if (Auth::check()) {
            // Obtén el ID del usuario autenticado
            $userId = Auth::id();
            // Crea un nuevo post utilizando los datos validados
            $reporteTecnico = new ReporteTecnico;
            $reporteTecnico->titulo = $request->titulo;
            $reporteTecnico->institucion = $request->institucion;
            $reporteTecnico->fecha_entrega = $request->fecha_entrega;
            $reporteTecnico->fecha_publicacion = $request->fecha_publicacion;
            $reporteTecnico->nombramiento = $request->nombramiento;
            $reporteTecnico->numero_paginas = $request->numero_paginas;
            $reporteTecnico->origen = $request->origen;
            $reporteTecnico->descripcion = $request->descripcion;
            $reporteTecnico->objetivos = $request->objetivos;
            $reporteTecnico->palabras_claves = $request->palabras_claves;
            //id user 
            $reporteTecnico->id_investigador = $userId;

            // Guarda el nuevo post en la base de datos
            $reporteTecnico->save();

            // Puedes devolver una respuesta o redirigir a otra página

            return response()->json($reporteTecnico, 200);
        }
    }

    public function show(reporteTecnico $reporteTecnico)
    {
        return $reporteTecnico;
    }

    public function update(Request $request, $id)
    {
        $reporteTecnico = reporteTecnico::find($id);

        if (!$reporteTecnico) {
            return response()->json('No se encontró', 404);
        }
        $request->validate([
            'titulo' => 'required|string|max:25',
            'institucion' => 'required|string',
            'fecha_entrega' => 'required|date',
            'fecha_publicacion' => 'required|date',
            'nombramiento' => 'required|string|max:25',
            'numero_paginas' => 'nullable|integer',
            'origen' => 'nullable|string|max:15',
            'descripcion' => 'nullable|string',
            'objetivos' => 'nullable|string',
            'palabras_claves' => 'nullable|string',
        ]);

        $reporteTecnico->titulo = $request->input('titulo');
        $reporteTecnico->institucion = $request->input('institucion');
        $reporteTecnico->fecha_entrega = $request->input('fecha_entrega');
        $reporteTecnico->fecha_publicacion = $request->input('fecha_publicacion');
        $reporteTecnico->nombramiento = $request->input('nombramiento');
        $reporteTecnico->numero_paginas = $request->input('numero_paginas');
        $reporteTecnico->origen = $request->input('origen');
        $reporteTecnico->descripcion = $request->input('descripcion');
        $reporteTecnico->objetivos = $request->input('objetivos');
        $reporteTecnico->palabras_claves = $request->input('palabras_claves');

        $reporteTecnico->update();
        return response()->json($reporteTecnico, 200);
    }

    public function destroy($id)
    {
        $reporteTecnico = reporteTecnico::find($id);

        if (!$reporteTecnico) {
            return response()->json('No se encontró ', 404);
        }

        $reporteTecnico->delete();
        return response()->json('Eliminado correctamente', 200);
    }
}
