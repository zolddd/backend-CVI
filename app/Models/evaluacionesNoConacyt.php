<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluacionesNoConacyt extends Model
{
    protected $table = 'evaluaciones_no_conacyt';
    use HasFactory;

    protected $fillable=[
        "institucion",
        "fecha_inicio",
        "fecha_fin",
        "cargo",
        "tipo_evaluacion",  
        "producto_evaluado",  
        "nombre_producto_evaluado",  
        "descripcion_actividad",  
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
