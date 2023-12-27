<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class divulgacion extends Model
{
    protected $table = 'divulgacion';
    use HasFactory;

    protected $fillable=[
        "titulo_trabajo",
        "tipo_participacion",
        "tipo_evento",
        "institucion_organizadora",
        "dirigido_a",
        "fecha",
        "tipo_divulgacion",
        "tipo_medio",
        "palabra_clave1",
        "palabra_clave2",
        "palabra_clave3",
        "notas",
        "producto_obtenido",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
