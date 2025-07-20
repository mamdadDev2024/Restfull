<?php

namespace App\Services;

use App\Contracts\BaseService;
use App\Models\User;
class UserService extends BaseService
{
    public function login($credentials){
        if (\Auth::attempt($credentials)) {
            return 
        }
    }
    public function create(array $data)
    {
        
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