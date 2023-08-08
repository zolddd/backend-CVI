<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Medio extends Model
{
    use HasFactory;
    protected $table = 'medio';
    /**
     * Campos que se pueden llenar de forma masiva
     * 
     * @var array<int,string> 
     * */
    protected $fillable = [
        "principal",
        "categoria",
        "telefono",
        "correo"
    ];

    protected $casts = [
        "categoria" => "string",
        "principal" => "boolean"
    ];

    public function users()
    {
        return $this->belongsToMany(Usuario::class, 'medio_pivots', 'medio_id', 'user_id');
    }
}