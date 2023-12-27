<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distincionesNoConacyt extends Model
{
    protected $table = 'distinciones_no_conacyt';
    use HasFactory;

    protected $fillable=[
        "nombre_distincion",
        "institucion",
        "year",
        "pais",
        "descripcion_distincion",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
