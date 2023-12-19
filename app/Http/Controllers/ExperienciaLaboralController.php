<?php

namespace App\Http\Controllers;

use App\Models\experienciaLaboral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienciaLaboralController extends Controller
{

    public function index()
    {
        return experienciaLaboral::all();
    }

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

        if (Auth::check()) {
            // Obtén el ID del usuario autenticado
            $userId = Auth::id();
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
            $experienciaLaboral->id_investigador = $userId;

            $experienciaLaboral->save();
            return response()->json($experienciaLaboral);
        }
    }


    public function show(experienciaLaboral $experienciaLaboral)
    {
        return $experienciaLaboral;
    }


    public function update(Request $request, $id)
    {
        $experienciaLaboral = experienciaLaboral::find($id);

        if (!$experienciaLaboral) {
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

        //data es un array con los datos del request
        $data["Puesto_desempeñado"] = $request["Puesto_desempeñado"];
        $data["Institucion"] = $request["Institucion"];
        $data["Fecha_inicio"] = $request["Fecha_inicio"];
        $data["Fecha_fin"] = $request["Fecha_fin"];
        $data["Nombramiento"] = $request["Nombramiento"];
        $data["Logros"] = $request["Logros"];
        $data["Areas"] = $request["Areas"];
        $data["Campo"] = $request["Campo"];
        $data["Disciplina"] = $request["Disciplina"];
        $data["Subdisciplina"] = $request["Subdisciplina"];

        //se realiza una busqueda por el id y se actualiza
        experienciaLaboral::find($id)->update($data);

        //se retorna el objecto ya actualizado traido de la bd
        $response = experienciaLaboral::find($id);

        return response()->json($response, 200);

    }

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
