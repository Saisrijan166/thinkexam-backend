<?php

use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TestsTableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CandidateTableController;

Route::controller(UserAuthController::class)->group(function () {
    Route::post('login', 'login')->middleware('throttle:5,1');
    Route::post('signup', 'signup');
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/profile', [ProfileController::class, 'getProfile']);
    Route::post('/reset-password', [ProfileController::class, 'resetPassword']);

    Route::controller(TestsTableController::class)->group(function () {
        Route::get('teststable', 'testTable');
        Route::delete('delete/{id}', 'delete');
        Route::put('edittest/{id}', 'editTest');
        Route::post('addtest', 'addTest');
        Route::get('/tests/count', 'countTests');
        Route::get('/tests/active/count', 'activeTestsCount');
        Route::get('getFilteredTests', 'getFilteredTests');
        Route::get('getcategorytests', 'getCategoryTests');
        Route::get('searchTests', 'searchTests');
        Route::get('tests/export', 'exportTests');
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
        Route::get('searchEvents', 'searchEvents');
    });

    Route::controller(CandidateTableController::class)->group(function () {
        Route::get('candidatetable', 'candidateTable');
        Route::delete('deletecandidate/{id}', 'deleteCandidate');
        Route::put('editcandidate/{id}', 'editCandidate');
        Route::get('getcandidates', 'getFilteredCandidates');
        Route::get('searchCandidates', 'searchCandidates');
    });

    Route::controller(ReportController::class)->group(function () {
        Route::get('reports', 'reportsTable');
        Route::get('reports/export', 'exportReports');
        Route::delete('/deleterecord/{id}', 'delete');
        Route::get('/reports/count', 'count');
        Route::get('getgroupreports', 'getGroupReports');
        Route::get('getcredibilityreports', 'getCredibilityReports');
        Route::get('getemails', 'getEmails');
        Route::get('searchReports', 'searchReports');
    });
});
