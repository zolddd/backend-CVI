<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gruposInvestigacion extends Model
{
    protected $table = 'grupos_investigacion';
    use HasFactory;


    protected $fillable=[
        "nombre_grupo",
        "fecha_creacion",
        "fecha_ingreso",
        "nombre_lider",
        "primer_apellido_lider",
        "segundo_apellido_lider",
        "institucion_adscripcion",
        "total_investigadores",
        "colaboracion",
        "impacto",
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
