<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/', [PostController::class, 'ClientRegister'])->name('user.registration');
// Route::get('/login',[PostController::class,'login'])->name('user.login');
Route::post('/login', [PostController::class, 'login'])->name('user.login');
Route::post('/register',[PostController::class,'register']);