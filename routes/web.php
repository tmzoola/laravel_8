<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;


Route::group([
    'middleware'=>'auth'
],function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::post('/posts', [PostController::class, 'store']);


    Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('post.like');
    Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('post.like');

    Route::get('/home', function () {
        return view('home');
    })->name('home');

});






Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/store_register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logged_in', [LoginController::class, 'store'])->name('logged');


