<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participacionCongreso extends Model
{
    protected $table = 'participacion_congreso';

    use HasFactory;


    protected $fillable=[
        "nombre_congreso",
        "titulo_trabajo",
        "participacion_congreso",
        "pais",
        "fecha",
        "palabra_clave1",
        "palabra_clave2",
        "palabra_clave3",
        "id_investigador"
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
