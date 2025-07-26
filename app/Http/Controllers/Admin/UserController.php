<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ApiResponseFacade;
use App\Http\ApiRequest\Admin\User\UserDeleteRequest;
use App\Http\ApiRequest\Admin\User\UserStoreRequest;
use App\Http\ApiRequest\Admin\User\UserUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    public function __construct(private UserService $service){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        return $this->service->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->service->show($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        return $this->service->update($user , $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDeleteRequest $request , User $user)
    {
        $request->validated();
        return $this->service->delete($user);
    }
}
