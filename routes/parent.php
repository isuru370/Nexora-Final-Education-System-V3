<?php

use App\Http\Controllers\API\Notification\NotificationController;
use App\Http\Controllers\API\Parent\Attendance\StudentAttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Parent\Auth\ParentAuthController;
use App\Http\Controllers\API\Parent\ClassSchedule\ClassScheduleController;
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

    Route::post('/auth/login', [ParentAuthController::class, 'login']);

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::post('/dashboard', [DashboardController::class, 'fetchDashboardData']);

    /*
    |--------------------------------------------------------------------------
    | Firebase Cloud Messaging
    |--------------------------------------------------------------------------
    */

    Route::prefix('/fcm')->group(function () {
        Route::post('/token', [FcmTokenController::class, 'store']);
        Route::post('/logout', [FcmTokenController::class, 'logout']);
    });

    /*
    |--------------------------------------------------------------------------
    | Attendance
    |--------------------------------------------------------------------------
    */

    Route::post('/attendance', [StudentAttendanceController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Payment
    |--------------------------------------------------------------------------
    */

    Route::post('/payments', [StudentPaymentController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Exam
    |--------------------------------------------------------------------------
    */

    Route::post('/exams', [ExamController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Result
    |--------------------------------------------------------------------------
    */

    Route::post('/results', [ResultController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Teacher Details
    |--------------------------------------------------------------------------
    */

    Route::post('/teachers', [TeacherController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Class Schedule
    |--------------------------------------------------------------------------
    */

    Route::post('/schedule', [ClassScheduleController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Notifications (Using NotificationController)
    |--------------------------------------------------------------------------
    */

    Route::prefix('/notifications')->group(function () {
        // Send notifications
        Route::post('/send', [NotificationController::class, 'send']);
        Route::post('/send-now', [NotificationController::class, 'sendNow']);
        Route::post('/bulk', [NotificationController::class, 'sendBulk']);
        Route::post('/send-to-all', [NotificationController::class, 'sendToAll']);
        Route::post('/send-to-grade/{grade}', [NotificationController::class, 'sendToGrade']);

        // Get notification status
        Route::get('/{id}/status', [NotificationController::class, 'status']);

        // Manage notifications
        Route::post('/{id}/retry', [NotificationController::class, 'retry']);
        Route::post('/{id}/cancel', [NotificationController::class, 'cancel']);
        Route::post('/{id}/read', [NotificationController::class, 'markAsRead']);

        // List and filter
        Route::get('/', [NotificationController::class, 'index']);
        Route::get('/student/{studentId}/history', [NotificationController::class, 'history']);

        // Stats and maintenance
        Route::get('/stats', [NotificationController::class, 'stats']);
        Route::delete('/cleanup', [NotificationController::class, 'deleteOld']);
    });
});
