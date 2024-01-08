<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporteTecnico extends Model
{
    use HasFactory;
    
    protected $fillable=[
        "titulo",
        "institucion",
        "fecha_entrega",
        "fecha_publicacion",
        "numero_paginas",
        "origen",
        "descripcion",
        "objetivos",
        "palabra_clave1",
        "palabra_clave2",
        "palabra_clave3",
        "apoyo_CONACYT",
        "fondo",
        "id_investigador"
    ];
}
