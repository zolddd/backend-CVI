<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redesInvestigacion extends Model
{

    protected $table = 'redes_investigacion';
    use HasFactory;
    protected $fillable=[
        "nombre_red",
        "fecha_creacion",
        "fecha_ingreso",
        "nombre_responsable",
        "primer_apellido_responsable",
        "segundo_apellido_responsable",
        "institucion_adscripcion",
        "total_integrantes",
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
