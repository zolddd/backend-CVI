<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificacionesMedicas extends Model
{
    protected $table = 'certificaciones_medicas';

    use HasFactory;

    protected $fillable=[
        "folio",
        "consejo",
        "especialidad",
        "vigencia_de",
        "vigencia_a",
        "tipo_certificacion", 
        "id_investigador",
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
