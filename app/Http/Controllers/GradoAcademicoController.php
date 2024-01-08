<?php

namespace App\Http\Controllers;

use App\Models\gradoAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradoAcademicoController extends Controller
{

    public function index()
    {
        try {
            if (Auth::check()) {
                // ID del usuario autenticado
                $userId = Auth::id();

                // Filtra los datos por el ID del usuario
                $data = gradoAcademico::where('id_investigador', $userId)->get();

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

        if (Auth::check()) {
            // Obtén el ID del usuario autenticado
            $userId = Auth::id();
            // Validar la solicitud


            // $request->validate([
            //     'Titulo' => 'required|string',
            //     'Nivel_escolaridad' => 'required|in:Licenciatura,Especialidad,Maestría,Doctorado,Otro',
            //     'Estatus' => 'required|in:Creditos terminados,Grado obtenido,Título o grado en proceso,Truncado',
            //     'Area' => 'required|string',
            //     'Campo' => 'required|string',
            //     'Disciplina' => 'required|string',
            //     'Subdisciplina' => 'required|string',
            //     'Cedula',
            //     'Opciones_Titulacion',
            //     'Fecha_Obtencion',
            //     'Institucion' => 'required|string',
            // ]);

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


            return response()->json($gradoAcademico, 200);
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
        // $request->validate([
        //     'Titulo' => 'required|string',
        //     'Nivel_escolaridad' => 'required|in:Licenciatura,Especialidad,Maestría,Doctorado,Otro',
        //     'Estatus' => 'required|in:Creditos terminados,Grado obtenido,Título o grado en proceso,Truncado',
        //     'Area' => 'required|string',
        //     'Campo' => 'required|string',
        //     'Disciplina' => 'required|string',
        //     'Subdisciplina' => 'required|string',
        //     'Cedula',
        //     'Opciones_Titulacion',
        //     'Fecha_Obtencion',
        //     'Institucion' => 'required|string',
        // ]);

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

        // Guardar los cambios en la base de datos.
        $gradoAcademico->update();
        return response()->json($gradoAcademico, 200);
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
