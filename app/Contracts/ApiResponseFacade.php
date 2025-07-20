<?php

namespace App\Contracts;

class ApiResponseFacade extends \Illuminate\Support\Facades\Facade{
    protected static function getFacadeAccessor(){
        return "ApiResponse";
    }
}