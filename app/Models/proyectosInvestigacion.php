<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyectosInvestigacion extends Model
{
    protected $table = 'proyectos_investigacion';
    use HasFactory;

    protected $fillable=[
        "nombre_proyecto",
        "tipo_proyecto",
        "inicio",
        "fin",
        "institucion",
        "logro_proyecto",
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
