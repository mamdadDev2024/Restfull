<?php

namespace App\Services;

use App\Contracts\BaseService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService extends BaseService
{
    public function login($credentials){
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
    }
    public function create(array $data)
    {
        $user = User::create($data);
        return $user;
    }

    public function update(User $user, array $data)
    {

    }

    public function delete(User $user)
    {

    }

    public function read(User $user)
    {

    }

    public function index()
    {

    }
}