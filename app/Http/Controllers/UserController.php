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
            return response()->json([
                "message" => "The number of parameters for this request are incorrect.",
                "errors" => ["Expected: 2 - Given: " . count($data)]
            ])->setStatusCode(400);
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
            return response()->json([
                "message" => "Parameters validation error.",
                "errors" => $validator->errors()
            ])->setStatusCode(400);
        }

        if (User::where('email', $data["email"])->exists()) {
            return response()->json([
                "message" => "A user with this email already exists.",
                "errors" => ["There is already a registered user with the given e-mail address."]
            ])->setStatusCode(409);
        }

        $newUser = new User;
        $newUser->fill($request->input());

        if ($newUser->save()) {
            return response()->json([
                "message" => "Register success!"
            ])->setStatusCode(201);
        }

        return response()->json([
            "errors" => "An error has occurred at the time of your request. Please contact technical support"
        ])->setStatusCode(500);
    }

    public function login(Request $request)
    {

        $data = $request->input();

        if (count($data) != 2) {
            return response()->json([
                "message" => "The number of parameters for this request are incorrect.",
                "errors" => ["Expected: 2. Given: " . count($data)]
            ])->setStatusCode(400);
        }

        $validator = Validator::make(
            $data,
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                "email.required" => "No email has been provided.",
                "email.email" => "The email format is invalid.",
                "password.email" => "No email has been provided."
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "message" => "Parameters validation error.",
                "errors" => $validator->errors()
            ])->setStatusCode(400);
        }


        $user = User::where('email', $data["email"])->first();

        if ($user && Hash::check($data["password"], $user->password)) {

            $token = $user->createToken("Access Token");

            return response()->json([
                "message" => "Successful Authentication.",
                "token" => $token->plainTextToken,
            ])->setStatusCode(200);
        }

        return response()->json([
            "message" => "Authentication could not be completed.",
            "errors" => ["Email or password do not match."]
        ])->setStatusCode(404);
    }
}
