<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lenguasIndigenas extends Model
{
    protected $table = 'lenguas_indigenas';
    use HasFactory;
    protected $fillable=[
        "lengua",
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
        "id_investigador"
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
