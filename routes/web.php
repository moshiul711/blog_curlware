<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

Route::get('/',[BlogController::class,'index'])->name('home');

//User Module
Route::post('/register',[UserController::class,'register'])->name('register');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
