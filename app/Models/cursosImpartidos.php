<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursosImpartidos extends Model
{
    use HasFactory;

    protected $fillable=[
        "Nombre_curso",
        "Horas_total",
        "Fecha_inicio",
        "Fecha_fin",
        "Nivel_escolaridad",
        "Area",
        "Campo",
        "Disciplina",
        "Subdisciplina",
        "id_investigador"
    ];


    public function usuario()
    {
        // efinir la relación muchos a uno (un curso impartido pertenece a un usuario)
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
