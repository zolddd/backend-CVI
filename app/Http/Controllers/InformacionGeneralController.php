<?php

namespace App\Http\Controllers;

use App\Models\InformacionGeneral;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class InformacionGeneralController extends Controller
{
    static public function validateInformation(array $data)
    {

        if (count($data) != 11) {
            return [false, [
                "message" => "The expected number of parameters for 'Informacion General' is incorrect.",
                "errors" => ["The required parameter number with matches the given ones. Expected: 11 - Given: " . count($data)]
            ]];
        }

        $validator = Validator::make($data, [
            "curp" => "required|size:18|regex:/^[A-Za-z]{4}[0-9]{6}[A-Za-z]{6}[A-Za-z0-9]{2}$/",
            "rfc" => "required|size:13|regex:/^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}$/",
            "nombre" => "required|regex:/^[A-Za-z\s]+$/u",
            "primer_apellido" => "required|alpha",
            "segundo_apellido" => "required|alpha",
            "fecha_de_nacimiento" => "required|date",
            "sexo" => [
                'required',
                'alpha',
                function ($attribute, $value, $fail) {
                    $allowedValues = ["MASCULINO", "FEMENINO", "SIN ESPECIFICAR"];
                    if (!in_array(strtoupper($value), $allowedValues)) {
                        $fail("The value of the $attribute field does not match any of the admissible attributes for its field.");
                    }
                },
            ],
            "pais" => "required|alpha",
            "entidad" => "required|alpha",
            "estado_conyugal" => [
                'required',
                'alpha',
                function ($attribute, $value, $fail) {
                    $allowedValues = ["CASADO", "DIVORCIADO", "SEPARADO", "SOLTERO", "UNION LIBRE", "VIUDO", "CONTRATOS DE CONVIVENCIA"];
                    if (!in_array(strtoupper($value), $allowedValues)) {
                        $fail("The value of the $attribute field does not match any of the admissible attributes for its field.");
                    }
                },
            ],
            "nacionalidad" => "required|alpha"
        ]);

        if ($validator->fails()) {
            return [false, [
                "message" => 'The data provided in "general information" is not valid.',
                "errors" => $validator->errors()
            ]];
        }

        return [true, "ada"];
    }

    static public function saveInformation(array $data)
    {
        $dataUpper = array_map('strtoupper', $data);
        $generalData = new InformacionGeneral;
        $generalData->fill($dataUpper);
        
        try {
            $generalData->save();
            $generalData->cvi = "CVI-".$generalData->id;
            $generalData->save();
            return [true, $generalData->id];
        } catch (QueryException $error) {
            if ($error->getCode() === '23000') {
                return [false, [
                    "message" => "An error has occurred at the time of your request.",
                    "errors" => ["Some of the unique data is already being used by another user."]
                ],409];
            }

            return [false, [
                "message" => "An error has occurred at the time of your request. Please contact technical support",
                "errors" => ["Error trying to save the user's general data."]
            ],500];
        }
    }
}
