<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otraFormacion extends Model
{
    protected $table = 'otra_formacion';
    use HasFactory;
    protected $fillable=[
        "formacion_continua",
        "nombre",
        "institucion",
        "year",
        "horas_totales",
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
