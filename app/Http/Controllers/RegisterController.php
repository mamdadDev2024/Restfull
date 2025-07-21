<?php

namespace App\Http\Controllers;

use App\Contracts\ApiResponseFacade;
use App\Http\ApiRequest\RegisterRequest;
use App\Services\UserService;

class RegisterController extends Controller
{
    public function __construct(private UserService $service){}
    public function __invoke(RegisterRequest $request){
        $user = $this->service->create($request->validated());
        $token = $user->createToken('api token');
        return ApiResponseFacade::Message('User Created!')
            ->Code(201)
            ->Data($token->plainTextToken)
            ->response();
    }
}

