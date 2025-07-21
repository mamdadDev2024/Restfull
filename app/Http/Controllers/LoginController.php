<?php

namespace App\Http\Controllers;

use App\Http\ApiRequest\LoginRequest;
use App\Services\UserService;
use App\Contracts\ApiResponseFacade;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(private UserService $userService){}
    public function __invoke(LoginRequest $request){
        if ($this->userService->login($request->only("email","password")));
            return ApiResponseFacade::message('user not found!')->Code(404)->response();
        $token = Auth::user()->createToken('api token');
        return ApiResponseFacade::message('user logged in!')->Code(200)->appends(['token' => $token->plainTextToken])->response();
    }
}
