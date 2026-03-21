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
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\ValidateAbsenceController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AssignDelegateController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::post('/createuser', [CreateStudentController::class, 'create']);
    Route::post('/createclasse', [CreateClasseController::class, 'create']);
    Route::post('/assignformateurclasse', [AssignFormateurClasseController::class, 'assign']);
    Route::post('/assignstudentclasse', [AssignStudentClasseController::class, 'assign']);
    Route::post('/assigndelegate', [AssignDelegateController::class, 'assign']);
    Route::post('/createactivites', [ActiviteController::class, 'activites']);
    Route::post('/absences',[AbsenceController::class,'dedicateAbsence']);
    Route::post('/absencejustification',[AbsenceController::class,'Absencejustification']);
    Route::post('/validateabsence',[ValidateAbsenceController::class,'validateAbsence']);
    Route::post('/createannouncement',[AnnouncementController::class,'createAnnouncement']);
    Route::get('/data', [DataController::class, 'data']);
    Route::get('/formateurdata', [FormateurDataController::class, 'Data']);

});

