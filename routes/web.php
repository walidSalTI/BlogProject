<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest')->group(function () {
    Route::post('/', [AuthController::class, 'authLogin']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name("register");
    Route::post('/register', [AuthController::class, 'storeRegister']);
});
Route::get('/', [AuthController::class, 'showLogin'])->name("login");

Route::middleware('auth')->resource('posts', PostController::class);
