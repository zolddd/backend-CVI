<?php

namespace App\Http\Controllers;

use App\Models\Medio;
use App\Http\Controllers\MedioPivotController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MedioController extends Controller
{
    public function record(Request $request)
    {

        $data = $request->input();

        if (count($data) > 4 || count($data) < 3) {
            return response()->json([
                "message" => "The number of parameters for this request are incorrect.",
                "errors" => ["The required parameter number with matches the given ones. Expected: 3-4 - Given: " . count($data)]
            ])->setStatusCode(400);
        }

        $validator = Validator::make(
            $data,
            [
                'principal' => 'required|boolean',
                'categoria' => [
                    'required',
                    'alpha',
                    function ($attribute, $value, $fail) {
                        $allowedValues = ["OFICIAL", "PERSONAL"];
                        if (!in_array(strtoupper($value), $allowedValues)) {
                            $fail("The value of the $attribute field does not match any of the admissible attributes for its field.");
                        }
                    },
                ],
                'telefono' => 'digits:10|numeric',
                'correo' => 'email',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "message" => "Parameters validation error.",
                "errors" => $validator->errors()
            ])->setStatusCode(400);
        }

        $medio = new Medio;

        $medio->fill($data);

        $medio->save();

        app()->call([MedioPivotController::class, 'store'], ["user" => $request->user(), "medio" => $medio]);

        // echo gettype($request->user()->id);
        return response()->json(["message" => "Medio successfully saved"])->setStatusCode(200);
    }

    public function list(Request $request)
    {
        return response()->json($request->user()->medio()->select([])->get())->setStatusCode(200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->input();

        $id = intval($id);

        $validator = Validator::make(
            $data,
            [
                'principal' => 'required|boolean',
                'categoria' => [
                    'required',
                    'alpha',
                    function ($attribute, $value, $fail) {
                        $allowedValues = ["OFICIAL", "PERSONAL"];
                        if (!in_array(strtoupper($value), $allowedValues)) {
                            $fail("The value of the $attribute field does not match any of the admissible attributes for its field.");
                        }
                    },
                ],
                'telefono' => 'digits:10|numeric',
                'correo' => 'email',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "message" => "Parameters validation error.",
                "errors" => $validator->errors()
            ])->setStatusCode(400);
        }

        if ($id == 0) {
            return response()->json([
                "message" => "Invalid param",
                "errors" => ["ID param must be integer and bigger than 0"]
            ])->setStatusCode(400);
        }

        $info = $request->user()->medio()->find($id);

        if ($info == null) {
            return response()->json([
                "message" => "Medio not found",
                "errors" => ["We couldn't found medio with ID " . $id]
            ])->setStatusCode(404);
        }

        $info->fill($data);
        $info->save();

        return response()->json(["message" => "Medio with ID " . $id . " updated"])->setStatusCode(200);
    }

    public function remove(Request $request, $id)
    {
        $id = intval($id);
        if ($id == 0) {
            return response()->json([
                "message" => "Invalid param",
                "errors" => ["ID param must be integer and bigger than 0"]
            ])->setStatusCode(400);
        }

        $info = $request->user()->medio()->find($id);

        if ($info == null) {
            return response()->json([
                "message" => "Medio not found",
                "errors" => ["We couldn't found medio with ID " . $id]
            ])->setStatusCode(404);
        }

        $info->delete();

        return response()->json(["message" => "Medio with ID " . $id . " removed"])->setStatusCode(200);
    }
}
