<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ApiResponseFacade;
use App\Http\ApiRequest\Admin\User\UserStoreRequest;
use App\Http\ApiRequest\Admin\User\UserUpdateRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserDetailCollection;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $service){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ApiResponseFacade::Data(User::all()->toResourceCollection())
            ->Code(200)
            ->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = $this->service->create($request->validated());
        $token = $user->createToken('api token');
        return ApiResponseFacade::Message('User Creation Sucessfuly')
            ->Code(201)
            ->Data($user)
            ->appends([
                'token' => $token->plainTextToken
            ])
            ->response();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return ApiResponseFacade::Data($user->toResource())->Code(200)->response();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
