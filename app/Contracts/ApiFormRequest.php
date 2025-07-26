<?php

namespace App\Contracts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class ApiFormRequest extends FormRequest
{
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json(["errors"=> $validator->errors()] , 422));
    }

    public function unauthenticated(){
        throw new HttpResponseException(
            response()->json(["errors"=> ["Unauthenticated."]] , 422)
        );
    }
}
