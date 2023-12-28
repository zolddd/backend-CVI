<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class difusionCapitulosPublicados extends Model
{
    protected $table = 'difusion_capitulos_publicados';
    use HasFactory;

    protected $fillable=[
        "ISBN",
        "titulo_libro",
        "editorial",
        "numero_edicion",
        "year_publicacion",
        "titulo_capitulo",
        "numero_capitulo",
        "de_pagina",
        "a_pagina",
        "resumen",     
        "area",
        "campo",
        "disciplina",
        "subdisciplina",
        "apoyo_CONACYT",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
