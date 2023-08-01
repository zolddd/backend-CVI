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
        "nombramiento",
        "numero_paginas",
        "origen",
        "descripcion",
        "objetivos",
        "palabras_claves",
    ];
}
