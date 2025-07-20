<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController;

Route::middleware('auth:sanctum')->get('/current-user', function (Request $request) {
    return $request->user();
});

Route::post('login', LoginController::class)->name('login');
Route::post('register', RegisterController::class)->name('register');

Route::middleware('auth:sanctum')->prefix('admin')->as('admin.')->group(function () {
    Route::apiResources([
        'user' => UserController::class,
        'article' => ArticleController::class,
    ]);
});
