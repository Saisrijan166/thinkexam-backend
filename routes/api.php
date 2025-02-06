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
    Route::get('/tests/count', 'count');
    Route::get('/tests/active/count', 'activeCount');
    Route::get('gettests', 'getFilteredTests');
    Route::get('getcategorytests', 'getCategoryTests');
    Route::get('tests/export', 'export');
});

Route::controller(CandidateController::class)->group(function () {
    Route::post('addcandidate', 'addcandidate');
    Route::post('uploadfiles', 'uploadFiles');
    Route::get('/candidates/count',  'count');
});


Route::controller(EventController::class)->group(function () {
    Route::get('eventtable', 'eventtable');
    Route::delete('deleteevent/{id}', 'deleteevent');
    Route::put('editevent/{id}', 'editevent');
    Route::post('addevent', 'addevent');
    Route::get('getevents', 'getFilteredEvents');
});

Route::controller(ReportController::class)->group(function () {
    Route::get('reports', 'index');
    Route::get('reports/export', 'export');
    // Route::delete('deletereport/{id}', 'delete');
    Route::get('/reports/count',  'count');
    Route::delete('/deleterecord/{id}', 'delete');
});





//="php artisan make:migration create_"&A1&"_table --create="&A1
//="php artisan make:model "&PROPER(A2)&" -m"




// php artisan migrate:generate
// mysqldump -u root -p demodatabase --no-create-info --complete-insert --ignore-table=demodatabase.migrations > data.sql
// php generate_seeders.php
// php artisan migrate:fresh --seed


// mysql -u root -p demodatabase < data.sql



// git commit -m "wed"
// git push origin -u main