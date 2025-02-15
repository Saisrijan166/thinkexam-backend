<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TestsTableControlller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidateTableController;

Route::controller(UserAuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('signup', 'signup');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/profile', [ProfileController::class, 'getProfile']);
    Route::post('/reset-password', [ProfileController::class, 'resetPassword']);

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
        Route::get('/candidates/count', 'count');
    });

    Route::controller(EventController::class)->group(function () {
        Route::get('eventtable', 'eventtable');
        Route::delete('deleteevent/{id}', 'deleteevent');
        Route::put('editevent/{id}', 'editevent');
        Route::post('addevent', 'addevent');
        Route::get('getevents', 'getFilteredEvents');
    });

    Route::controller(CandidateTableController::class)->group(function () {
        Route::get('candidatetable', 'candidatetable');
        Route::delete('deletecandidate/{id}', 'deleteCandidate');
        Route::put('editcandidate/{id}', 'editCandidate');
        Route::get('getcandidates', 'getFilteredCandidates');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('reports', 'index');
        Route::get('reports/export', 'export');
        Route::delete('/deleterecord/{id}', 'delete');
        Route::get('/reports/count', 'count');
        Route::get('getgroupreports', 'getGroupReports');
        Route::get('getcredibilityreports', 'getCredibilityReports');
        Route::get('getemails', 'getEmails');
    });
});

