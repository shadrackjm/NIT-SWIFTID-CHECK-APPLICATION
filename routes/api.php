<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register/user',[AuthController::class,'registerUser']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/get-exam', [StudentController::class,'getStudentData']);
    Route::post('/scan', [StudentController::class,'getSpecificStudent']);
});
