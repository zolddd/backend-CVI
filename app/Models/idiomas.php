<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idiomas extends Model
{
    protected $table = 'idiomas';
    use HasFactory;
    protected $fillable=[
        "institucion",
        "idioma",
        "grado_dominio",
        "nivel_conversacion",
        "nivel_lectura",
        "nivel_escritura",
        "certificacion",
        "fecha_evaluacion",
        "documento_probatorio",
        "vigencia_de",
        "vigencia_a",
        "puntos",
        "nivel",
        "id_investigador"
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
