<?php

namespace App\Services;

use App\Contracts\BaseService;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function login($credentials){
        return app(BaseService::class)(function () use($credentials) {
            Auth::attempt($credentials);
            return Auth::user()->createToken('api token')->plainTextToken;
        });
    }
    public function create(array $data)
    {
        return app(BaseService::class)(function () use($data) {
            return User::create($data)->createToken('api token')->painTextToken;
        });
    }

    public function update(User $user, array $data)
    {
        return app(BaseService::class)(function () use($data , $user){
            $user->update($data);
            return $user->refresh();
        });
    }

    public function delete(User $user)
    {
        return app(BaseService::class)(function () use($user){
            return $user->delete();
        });
    }

    public function show(User $user)
    {
        return app(BaseService::class)(function () use($user){
            return $user->toResource(UserResource::class);
        });
    }

    public function index()
    {
        return app(BaseService::class)(function () {
            return User::all()->toResourceCollection();
        });
    }
}