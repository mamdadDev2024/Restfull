<?php

namespace App\Contracts;

/**
 * @method Message()
 * @method Code()
 * @method appends()
 * @method response()
 * @method Data()
 *
 */
class ApiResponseFacade extends \Illuminate\Support\Facades\Facade{
    protected static function getFacadeAccessor(){
        return "ApiResponse";
    }
}
