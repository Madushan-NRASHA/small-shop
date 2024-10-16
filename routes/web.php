<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Registration form
Route::get('/register', [PostController::class, 'ClientRegister'])->name('user.registration');

// Handle registration form submission
Route::post('/register', [PostController::class, 'register']);

// Login form
Route::get('/login', [PostController::class, 'login'])->name('user.login');
