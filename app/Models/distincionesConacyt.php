<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class distincionesConacyt extends Model
{
    protected $table = 'distinciones_conacyt';
    use HasFactory;

    protected $fillable=[
        "nombre_distincion",
        "year",
        "id_investigador"
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_investigador');
    }
}
