<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $data = $request->input();

        if (count($data) != 2) {
            return response()->json(["errors" => ["Expected: 5. Given: " . count($data)]])->setStatusCode(400);
        }

        $validator = Validator::make(
            $data,
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ],
            [
                "email.required" => "No email has been provided.",
                "email.email" => "The email format is invalid.",
                "password.email" => "No email has been provided.",
                "password.min" => "The password field must be at least 8 characters long.",
            ]
        );

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()])->setStatusCode(400);
        }

        if (User::where('email', $data["email"])->exists()) {
            return response()->json(["errors" => ["There is already a registered user with the given e-mail address."]])->setStatusCode(409);
        }

        $newUser = new User;
        $newUser->fill($request->input());

        if ($newUser->save()) {
            return response()->json(["message" => "Register success!"])->setStatusCode(201);
        } else {
            return response()->json(["erros" => "An error has occurred at the time of your request. Please contact technical support"])->setStatusCode(500);
        }
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->input("email"))->first();
        if ($user) {

            if (Hash::check($request->input("password"), $user->password)) {

                $token = $user->createToken("example");

                $response["status"] = 1;
                $response["msg"] = $token->plainTextToken;
            } else {
                $response["msg"] = "Credenciales incorrectas.";
            }
        } else {
            $response["msg"] = "Usuario no encontrado.";
        }

        return response()->json($response);
    }
}
