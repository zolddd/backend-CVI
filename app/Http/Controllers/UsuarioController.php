<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\InformacionGeneralController;

class UsuarioController extends Controller
{
    public function register(Request $request)
    {

        $data = $request->input();

        if (count($data) != 3) {
            return response()->json([
                "message" => "The number of parameters for this request are incorrect.",
                "errors" => ["The required parameter number with matches the given ones. Expected: 3 - Given: " . count($data)]
            ])->setStatusCode(400);
        }

        $validator = Validator::make(
            $data,
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
                'informacion_general' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "message" => "Parameters validation error.",
                "errors" => $validator->errors()
            ])->setStatusCode(400);
        }

        $generalDataValidate = app()->call([InformacionGeneralController::class, 'validateInformation'], ["data" => $data["informacion_general"]]);

        if (!$generalDataValidate[0]) {
            return response()->json($generalDataValidate[1])->setStatusCode(400);
        }

        $userIdorError = app()->call([InformacionGeneralController::class, 'saveInformation'], ["data" => $data["informacion_general"]]);

        if (Usuario::where('email', $data["email"])->exists()) {
            return response()->json([
                "message" => "A user with this email already exists.",
                "errors" => ["There is already a registered user with the given e-mail address."]
            ])->setStatusCode(409);
        }

        if (!$userIdorError[0]) {
            return response()->json($userIdorError[1])->setStatusCode($userIdorError[2]);
        }

        $newUser = new Usuario;
        $newUser->fill($request->input());
        $newUser->informacion_general_id = $userIdorError[1];

        if ($newUser->save()) {
            return response()->json([
                "message" => "Register success!",
                "token" => $newUser->createToken("Access Token")->plainTextToken
            ])->setStatusCode(201);
        }

        return response()->json([
            "message" => "An error has occurred at the time of your request. Please contact technical support",
            "errors" => ["Error trying to register new user."]
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
                'password' => 'required|min:8'
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


        $user = Usuario::where('email', $data["email"])->first();

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

    public function update(Request $request)
    {
        $data = $request->input();
        $validKeys = ["email", "new_password", "old_password"];

        $data = array_filter($data, function ($key) use ($validKeys) {
            return in_array($key, $validKeys);
        }, ARRAY_FILTER_USE_KEY);

        $validator = Validator::make(
            $data,
            [
                'email' => 'email',
                'new_password' => 'min:8'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "message" => "Parameters validation error.",
                "errors" => $validator->errors()
            ])->setStatusCode(400);
        }

        $keys = array_keys($data);

        if ((in_array("new_password", $keys) && !in_array("old_password", $keys)) ||
            (!in_array("new_password", $keys) && in_array("old_password", $keys))
        ) {
            return response()->json([
                "message" => "Missing params",
                "errors" => ["old_password or new_password params not found in yout request"]
            ])->setStatusCode(400);
        }

        if(in_array("new_password", $keys) && !Hash::check($data["old_password"],$request->user()->password)){
            return response()->json([
                "message" => "Wrong password",
                "errors" => ["The password entered does not match the current password."]
            ])->setStatusCode(400);
        }        

        if(in_array("new_password", $keys)){
            $request->user()->password = $data["new_password"];
        }

        if(in_array("email", $keys)){
            $request->user()->email = $data["email"];
        }

        $request->user()->save();
        return response()->json(["message" => "User credentials updated"])->setStatusCode(200);
    }

    public function remove(Request $request){

        $data = $request->input();

        $validator = Validator::make(
            $data,
            [
                'password' => 'required|min:8'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "message" => "Parameters validation error.",
                "errors" => $validator->errors()
            ])->setStatusCode(400);
        }

        if(!Hash::check($data["password"],$request->user()->password)){
            return response()->json([
                "message" => "Wrong password",
                "errors" => ["The password entered does not match the current password."]
            ])->setStatusCode(400);
        }

        $request->user()->delete();

        return response()->json(["message"=>"Your account has been successfully deleted"])->setStatusCode(200);
    }
}
