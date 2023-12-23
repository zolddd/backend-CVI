<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tesisDirigida extends Model
{

    protected $table = 'tesis_dirigida';
    use HasFactory;

    protected $fillable=[
        "nombre_autor",
        "primer_apellido_autor",
        "segundo_apellido_autor",
        "grado_academico",
        "rol_participacion",
        "area",
        "campo",
        "disciplina",
        "subdisciplina",       
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
