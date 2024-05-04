<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register/user',[AuthController::class,'registerUser']);
Route::post('/login',[AuthController::class,'login']);
