<?php

namespace App\Http\Controllers;

use App\Http\ApiRequest\LoginRequest;
use App\Services\UserService;
use App\Contracts\ApiResponseFacade;
class LoginController extends Controller
{
    public function __construct(private UserService $userService){}
    public function __invoke(LoginRequest $request){
        $user = $this->userService->login($request->only("email","password"));
        return ApiResponseFacade::message($user);
    }
}
