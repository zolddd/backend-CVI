<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $newUser = new User;

        $newUser->fill($request->input());

        $newUser->save();

        return response()->json(["message"=>"Register success!"])->setStatusCode(200);
    }

    public function login(Request $request){
        $user = User::where('email',$request->input("email"))->first();
        if($user){

            if(Hash::check($request->input("password"),$user->password)){

                $token = $user->createToken("example");

                $response["status"] = 1;
                $response["msg"] = $token->plainTextToken;

            }else{
                $response["msg"] = "Credenciales incorrectas.";
            }

        }else{
            $response["msg"] = "Usuario no encontrado.";
        }

        return response()->json($response);
    }

}