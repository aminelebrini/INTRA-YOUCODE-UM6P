<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateStudentController;
use App\Http\Controllers\CreateClasseController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AssignFormateurClasseController;
use App\Http\Controllers\FormateurDataController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\AssignStudentClasseController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::post('/createstudents', [CreateStudentController::class, 'create']);
    Route::post('/createclasse', [CreateClasseController::class, 'create']);
    Route::post('/assignformateurclasse', [AssignFormateurClasseController::class, 'assign']);
    Route::post('/assignstudentclasse', [AssignStudentClasseController::class, 'assign']);
    Route::post('/createactivites', [ActiviteController::class, 'activites']);
    Route::get('/data', [DataController::class, 'data']);
    Route::get('/formateurdata', [FormateurDataController::class, 'Data']);

});

