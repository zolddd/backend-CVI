<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gradoAcademico extends Model
{
    use HasFactory;
    protected $fillable =[
        "Titulo",
        "Nivel_escolaridad",
        "Estatus",
        "Area",
        "Campo",
        "Disciplina",
        "Subdisciplina",
        "Cedula",
        "Opciones_Titulacion",
        "Fecha_Obtencion",
        "Institucion",
        "id_investigador"
    ];

    public function usuario()
    {
        // efinir la relación muchos a uno (un curso impartido pertenece a un usuario)
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
