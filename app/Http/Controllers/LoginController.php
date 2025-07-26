<?php

namespace App\Http\Controllers;

use App\Http\ApiRequest\LoginRequest;
use App\Services\UserService;
use App\Contracts\ApiResponseFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct(private UserService $userService){}
    
    public function __invoke(LoginRequest $request){
        return $this->userService->login($request->validated());
    }
}
