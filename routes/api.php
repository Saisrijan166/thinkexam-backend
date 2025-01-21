<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('test', function (Request $request) {
    return "correct";
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('list',[StudentController::class,'list']);
    Route::post('add',[StudentController::class,'add']);
    Route::get('delete/{id}',[StudentController::class,'delete']);
    Route::get('edit/{id}',[StudentController::class,'edit']);
    Route::put('editstudent/{id}',[StudentController::class,'editstudent']);
    Route::get('search',[StudentController::class,'search']);
    Route::post('deleteall',[StudentController::class,'deleteall']);
});


Route::controller(UserAuthController::class)->group(function () {
    
    Route::post('login', 'login');
    Route::post('signup', 'signup');
});