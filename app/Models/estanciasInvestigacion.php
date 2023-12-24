<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estanciasInvestigacion extends Model
{
    protected $table = 'estancias_investigacion';
    use HasFactory;

    protected $fillable=[
        "institucion",
        "nombre_estancia",
        "inicio",
        "fin",
        "tipo_estancia",
        "logro_profesional",
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
