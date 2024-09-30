<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');


Route::get('/registerForm', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/handleRegister', [AuthController::class, 'handleRegister'])->name('handleRegister');
Route::get('/loginForm', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/handleLogin', [AuthController::class, 'handleLogin'])->name('handleLogin');
