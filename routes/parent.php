<?php

use App\Http\Controllers\API\Parent\Attendance\StudentAttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Parent\Auth\ParentAuthController;
use App\Http\Controllers\API\Parent\Dashboard\DashboardController;
use App\Http\Controllers\API\Parent\Exam\ExamController;
use App\Http\Controllers\API\Parent\FCM\FcmTokenController;
use App\Http\Controllers\API\Parent\Payment\StudentPaymentController;
use App\Http\Controllers\API\Parent\Result\ResultController;
use App\Http\Controllers\API\Parent\Teacher\TeacherController;

Route::prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */

    Route::post('/auth/login', [
        ParentAuthController::class,
        'login'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::post('/dashboard', [
        DashboardController::class,
        'fetchDashboardData'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Firebase Cloud Messaging
    |--------------------------------------------------------------------------
    */

    Route::post('/fcm/token', [
        FcmTokenController::class,
        'store'
    ]);

    Route::post('/fcm/logout', [
        FcmTokenController::class,
        'logout'
    ]);

    /*
|--------------------------------------------------------------------------
| Attendance
|--------------------------------------------------------------------------
*/

    Route::post('/attendance', [
        StudentAttendanceController::class,
        'index'
    ]);

    /*
|--------------------------------------------------------------------------
| Payment
|--------------------------------------------------------------------------
*/

    Route::post('/payments', [
        StudentPaymentController::class,
        'index'
    ]);

    /*
|--------------------------------------------------------------------------
| Exam
|--------------------------------------------------------------------------
*/

    Route::post('/exams', [
        ExamController::class,
        'index'
    ]);

    /*
|--------------------------------------------------------------------------
| Result
|--------------------------------------------------------------------------
*/

    Route::post('/results', [
        ResultController::class,
        'index'
    ]);

        /*
|--------------------------------------------------------------------------
| Teacher Details
|--------------------------------------------------------------------------
*/

    Route::post('/teachers', [
        TeacherController::class,
        'index'
    ]);
});
