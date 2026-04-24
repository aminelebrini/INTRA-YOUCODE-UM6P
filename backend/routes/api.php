<?php

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
use App\Http\Controllers\SendLivrableController;
use App\Http\Controllers\StudentDataController; 
use App\Http\Controllers\UpdateUserController;
use App\Http\Controllers\GradeStudentController;
use App\Http\Controllers\CreateSquadController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/getannouncements', [AnnouncementController::class, 'getAnnouncements']);

    Route::middleware('role:admin')->group(function () {
        Route::post('/createuser', [CreateStudentController::class, 'create']);
        Route::post('/detectabsence', [AbsenceController::class, 'dedicateAbsence']);
        Route::put('/updateusers', [UpdateUserController::class, 'update']);
        Route::post('/send-lien', [UpdateUserController::class, 'SendLien']);
        Route::post('/createclasse', [CreateClasseController::class, 'create']);
        Route::put('/updateclasse', [CreateClasseController::class, 'update']);
        Route::post('/assignformateurclasse', [AssignFormateurClasseController::class, 'assign']);
        Route::post('/validateabsence', [ValidateAbsenceController::class, 'validateAbsence']);
        Route::post('/createannouncement', [AnnouncementController::class, 'createAnnouncement']);
        Route::put('/updateannouncement', [AnnouncementController::class, 'updateAnnouncement']);
        Route::get('/data', [DataController::class, 'data']);
        Route::get('/alldata', [DataController::class, 'allData']);
    });

    Route::middleware('role:formateur')->group(function () {
        Route::post('/assignstudentclasse', [AssignStudentClasseController::class, 'assign']);
        Route::post('/assigndelegate', [AssignDelegateController::class, 'assign']);
        Route::post('/createactivites', [ActiviteController::class, 'activites']);
        Route::put('/updateactivite', [ActiviteController::class, 'update']);
        Route::post('/absences', [AbsenceController::class, 'dedicateAbsence']);
        Route::post('/createsquad', [CreateSquadController::class, 'create']);
        Route::post('/gradestudent', [GradeStudentController::class, 'gradeStudent']);
        Route::get('/formateurdata', [FormateurDataController::class, 'Data']);
        Route::get('/students', [FormateurDataController::class, 'getStudents']);
        Route::get('/studentabsences', [FormateurDataController::class, 'getStudentAbsences']);
        Route::get('/squads', [FormateurDataController::class, 'getSquads']);
        Route::get('/activites', [FormateurDataController::class, 'getActivites']);
        Route::get('/getstudents', [FormateurDataController::class, 'getAllStudents']);
    });

    Route::middleware('role:etudiant')->group(function () {
        Route::post('/sendlivrable', [SendLivrableController::class, 'sendLivrable']);
        Route::post('/absencejustification', [AbsenceController::class, 'Absencejustification']);
        Route::get('/studentdata', [StudentDataController::class, 'data']);
        Route::get('/leaderboard', [StudentDataController::class, 'Leaderboard']);
    });
});
