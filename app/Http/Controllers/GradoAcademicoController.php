<?php

namespace App\Http\Controllers;

use App\Models\gradoAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradoAcademicoController extends Controller
{

    public function index()
    {
        return gradoAcademico::all();
    }

    public function store(Request $request)
    {

        if (Auth::check()) {
            // Obtén el ID del usuario autenticado
            $userId = Auth::id();
            // Validar la solicitud
            $request->validate([
                'Titulo' => 'required|string|max:25',
                'Nivel_escolaridad' => 'required|in:preparatoria,licenciatura,ingeniería,maestría,doctorado',
                'Estatus' => 'required|in:Activo,Inactivo,En proceso',
                'Area' => 'required|string|max:25',
                'Campo' => 'required|string|max:25',
                'Disciplina' => 'required|string|max:25',
                'Subdisciplina' => 'required|string|max:25',
                'Cedula' => 'required|string|max:25',
                'Opciones_Titulacion' => 'required|string|max:25',
                'Fecha_Obtencion' => 'required|date',
                'Institucion' => 'required|string',
            ]);

            // Crear una nueva instancia del modelo gradoAcademico y asignar los valores de los campos.
            $gradoAcademico = new gradoAcademico;
            $gradoAcademico->Titulo = $request->input('Titulo');
            $gradoAcademico->Nivel_escolaridad = $request->input('Nivel_escolaridad');
            $gradoAcademico->Estatus = $request->input('Estatus');
            $gradoAcademico->Area = $request->input('Area');
            $gradoAcademico->Campo = $request->input('Campo');
            $gradoAcademico->Disciplina = $request->input('Disciplina');
            $gradoAcademico->Subdisciplina = $request->input('Subdisciplina');
            $gradoAcademico->Cedula = $request->input('Cedula');
            $gradoAcademico->Opciones_Titulacion = $request->input('Opciones_Titulacion');
            $gradoAcademico->Fecha_Obtencion = $request->input('Fecha_Obtencion');
            $gradoAcademico->Institucion = $request->input('Institucion');

            $gradoAcademico->id_investigador = $userId;

            // Guardar el nuevo grado académico en la base de datos.
            $gradoAcademico->save();

            return $gradoAcademico;
        }

    }

    public function show(gradoAcademico $gradoAcademico)
    {
        return $gradoAcademico;
    }

    public function update(Request $request, $id)
    {
        // Verificar si el registro con el ID especificado existe
        $gradoAcademico = gradoAcademico::find($id);

        if (!$gradoAcademico) {
            return response()->json('No se encontró', 404);
        }

        // Validar la solicitud
        $request->validate([
            'Titulo' => 'required|string|max:25',
            'Nivel_escolaridad' => 'required|in:preparatoria,licenciatura,ingeniería,maestría,doctorado',
            'Estatus' => 'required|in:Activo,Inactivo,En proceso',
            'Area' => 'required|string|max:25',
            'Campo' => 'required|string|max:25',
            'Disciplina' => 'required|string|max:25',
            'Subdisciplina' => 'required|string|max:25',
            'Cedula' => 'required|string|max:25',
            'Opciones_Titulacion' => 'required|string|max:25',
            'Fecha_Obtencion' => 'required|date',
            'Institucion' => 'required|string',
        ]);

        // Actualizar los campos del registro
        $gradoAcademico->Titulo = $request->input('Titulo');
        $gradoAcademico->Nivel_escolaridad = $request->input('Nivel_escolaridad');
        $gradoAcademico->Estatus = $request->input('Estatus');
        $gradoAcademico->Area = $request->input('Area');
        $gradoAcademico->Campo = $request->input('Campo');
        $gradoAcademico->Disciplina = $request->input('Disciplina');
        $gradoAcademico->Subdisciplina = $request->input('Subdisciplina');
        $gradoAcademico->Cedula = $request->input('Cedula');
        $gradoAcademico->Opciones_Titulacion = $request->input('Opciones_Titulacion');
        $gradoAcademico->Fecha_Obtencion = $request->input('Fecha_Obtencion');
        $gradoAcademico->Institucion = $request->input('Institucion');

        // Guardar los cambios en la base de datos.
        $gradoAcademico->update();

        // Devolver el objeto actualizado en la respuesta.
        return $gradoAcademico;
    }

    public function destroy($id)
    {
        $gradoAcademico = gradoAcademico::find($id);

        if (!$gradoAcademico) {
            return response()->json('No se encontró ', 404);
        }

        $gradoAcademico->delete();
        return response()->json('Eliminado correctamente', 200);
    }


}
