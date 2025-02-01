<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestsTableControlller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController; 
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CandidateFileController;



Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('test', function (Request $request) {
//     return "correct";
// });
//     Route::get('list',[StudentController::class,'list']);

// Route::group(['middleware' => 'auth:sanctum'], function () {
//     Route::post('add',[StudentController::class,'add']);
//     Route::get('delete/{id}',[StudentController::class,'delete']);
//     Route::get('edit/{id}',[StudentController::class,'edit']);
//     Route::put('editstudent/{id}',[StudentController::class,'editstudent']);
//     Route::get('search',[StudentController::class,'search']);
//     Route::post('deleteall',[StudentController::class,'deleteall']);
// });


Route::controller(UserAuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('signup', 'signup');
});


Route::controller(TestsTableControlller::class)->group(function () {
    Route::get('teststable', 'teststable');
    Route::delete('delete/{id}', 'delete');
    Route::put('edittest/{id}', 'edittest');
    Route::post('addtest', 'addtest');
});

Route::controller(CandidateController::class)->group(function () {
    Route::post('addcandidate', 'addcandidate');
    Route::post('uploadfiles', 'uploadFiles');
});




Route::controller(EventController::class)->group(function () {
    Route::get('eventtable','eventtable');
    Route::delete('deleteevent/{id}', 'deleteevent');
    Route::put('editevent/{id}', 'editevent');
    Route::post('addevent', 'addevent');
});

Route::controller(ReportController::class)->group(function () {
    Route::get('reports','index');
    // Route::delete('deletereport/{id}', 'delete');

});

Route::delete('/deleterecord/{id}', [ReportController::class, 'delete']);
