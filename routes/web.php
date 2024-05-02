<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

Route::get('/',[BlogController::class,'index'])->name('home');

//User Module
Route::post('/register',[UserController::class,'register'])->name('register');
