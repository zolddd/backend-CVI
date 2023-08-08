<?php

namespace App\Http\Controllers;

use App\Models\Medio;
use App\Models\MedioPivot;
use App\Models\Usuario;
use Illuminate\Http\Request;

class MedioPivotController extends Controller
{
    static public function store(Usuario $user, Medio $medio)
    {
        $medio = new MedioPivot(
            [
                "medio_id" => $medio->id,
                "user_id" => $user->id
            ]
        );

        $medio->save();
    }

    static public function getByUserID(Usuario $user){
        $response = MedioPivot::where('user_id',$user->id);
    }
}
