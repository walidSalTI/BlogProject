<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

use Illuminate\Support\Facades\Auth;

Route::get('/', [AuthController::class, 'showLogin'])->name("login");
Route::middleware('guest')->group(function () {
    Route::post('/', [AuthController::class, 'authLogin']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name("register");
    Route::post('/register', [AuthController::class, 'storeRegister']);
});

Route::middleware('auth')->group(function (){
    Route::resource('posts', PostController::class);
    Route::post('/logout',[AuthController::class, 'logOut'])->name('logout');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::post('/posts/{post}/comments',[CommentController::class,'store'])->name('comments.store');
    Route::delete('/posts/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');
    Route::get('/posts/comments/{comment}',[CommentController::class,'edit'])->name('comments.edit');
    Route::put('/posts/comments/{comment}',[CommentController::class,'update'])->name('comments.update');
});
