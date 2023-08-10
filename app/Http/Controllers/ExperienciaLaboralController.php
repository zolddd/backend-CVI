<?php

namespace App\Http\Controllers;

use App\Models\experienciaLaboral;
use Illuminate\Http\Request;

class ExperienciaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return experienciaLaboral::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'Puesto_desempeñado' => 'required|string|max:25',
            'Institucion' => 'required|string',
            'Fecha_inicio' => 'required|date',
            'Fecha_fin' => 'required|date|after_or_equal:Fecha_inicio',
            'Nombramiento' => 'required|string|max:25',
            'Logros' => 'required|string',
            'Areas' => 'required|string|max:25',
            'Campo' => 'required|string|max:25',
            'Disciplina' => 'required|string|max:25',
            'Subdisciplina' => 'required|string|max:25',
        ]);
    
        // Crear una nueva instancia del modelo ExperienciaLaboral y asignar los valores de los campos.
        $experienciaLaboral = new ExperienciaLaboral;
        $experienciaLaboral->Puesto_desempeñado = $request->input('Puesto_desempeñado');
        $experienciaLaboral->Institucion = $request->input('Institucion');
        $experienciaLaboral->Fecha_inicio = $request->input('Fecha_inicio');
        $experienciaLaboral->Fecha_fin = $request->input('Fecha_fin');
        $experienciaLaboral->Nombramiento = $request->input('Nombramiento');
        $experienciaLaboral->Logros = $request->input('Logros');
        $experienciaLaboral->Areas = $request->input('Areas');
        $experienciaLaboral->Campo = $request->input('Campo');
        $experienciaLaboral->Disciplina = $request->input('Disciplina');
        $experienciaLaboral->Subdisciplina = $request->input('Subdisciplina');
    
        // Guardar la nueva experiencia laboral en la base de datos.
        $experienciaLaboral->save();
    
        // Devolver el objeto creado en la respuesta (esto no es necesario, pero es útil para confirmar que se guardó correctamente).
        return response()->json($experienciaLaboral);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(experienciaLaboral $experienciaLaboral)
    {
        return $experienciaLaboral;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $experienciaLaboral =  experienciaLaboral::find($id);

        if (! $experienciaLaboral) {
            return response()->json('No se encontró', 404);
        }
        // Validar la solicitud
        $request->validate([
            'Puesto_desempeñado' => 'required|string|max:25',
            'Institucion' => 'required|string',
            'Fecha_inicio' => 'required|date',
            'Fecha_fin' => 'required|date|after_or_equal:Fecha_inicio',
            'Nombramiento' => 'required|string|max:25',
            'Logros' => 'required|string',
            'Areas' => 'required|string|max:25',
            'Campo' => 'required|string|max:25',
            'Disciplina' => 'required|string|max:25',
            'Subdisciplina' => 'required|string|max:25',
        ]);

        // Crear una nueva instancia del modelo ExperienciaLaboral y asignar los valores de los campos.
        $experienciaLaboral = new ExperienciaLaboral;
        $experienciaLaboral->Puesto_desempeñado = $request->input('Puesto_desempeñado');
        $experienciaLaboral->Institucion = $request->input('Institucion');
        $experienciaLaboral->Fecha_inicio = $request->input('Fecha_inicio');
        $experienciaLaboral->Fecha_fin = $request->input('Fecha_fin');
        $experienciaLaboral->Nombramiento = $request->input('Nombramiento');
        $experienciaLaboral->Logros = $request->input('Logros');
        $experienciaLaboral->Areas = $request->input('Areas');
        $experienciaLaboral->Campo = $request->input('Campo');
        $experienciaLaboral->Disciplina = $request->input('Disciplina');
        $experienciaLaboral->Subdisciplina = $request->input('Subdisciplina');

        // Guardar la nueva experiencia laboral en la base de datos.
        $experienciaLaboral->save();

        // Devolver el objeto creado en la respuesta (esto no es necesario, pero es útil para confirmar que se guardó correctamente).
        return response()->json($experienciaLaboral);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $experienciaLaboral = experienciaLaboral::find($id);

        if (!$experienciaLaboral) {
            return response()->json('No se encontró ', 404);
        }
    
        $experienciaLaboral->delete();
        return response()->json('Eliminado correctamente', 200);
    }
}
