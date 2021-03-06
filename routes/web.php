<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 1:07:30

Route::get('/', fn() => view('home'))->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])
    ->name('register')
    ->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])
    ->name('logout');

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.delete');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.like');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.like');
