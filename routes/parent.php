<?php

use App\Http\Controllers\API\Notification\NotificationController;
use App\Http\Controllers\API\Parent\Attendance\StudentAttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Parent\Auth\ParentAuthController;
use App\Http\Controllers\API\Parent\ClassSchedule\ClassScheduleController;
use App\Http\Controllers\API\Parent\Dashboard\DashboardController;
use App\Http\Controllers\API\Parent\Exam\ExamController;
use App\Http\Controllers\API\Parent\FCM\FcmTokenController;
use App\Http\Controllers\API\Parent\Notification\ParentNotificationController;
use App\Http\Controllers\API\Parent\Payment\StudentPaymentController;
use App\Http\Controllers\API\Parent\Result\ResultController;
use App\Http\Controllers\API\Parent\Teacher\TeacherController;

Route::prefix('v1')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication (Public - No Auth Required)
    |--------------------------------------------------------------------------
    */

    Route::post('/auth/login', [ParentAuthController::class, 'login']);

    /*
    |--------------------------------------------------------------------------
    | Dashboard (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::post('/dashboard', [DashboardController::class, 'fetchDashboardData']);

    /*
    |--------------------------------------------------------------------------
    | Firebase Cloud Messaging (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::prefix('/fcm')->group(function () {
        Route::post('/token', [FcmTokenController::class, 'store']);
        Route::post('/logout', [FcmTokenController::class, 'logout']);
    });

    /*
    |--------------------------------------------------------------------------
    | Attendance (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::post('/attendance', [StudentAttendanceController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Payment (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::post('/payments', [StudentPaymentController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Exam (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::post('/exams', [ExamController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Result (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::post('/results', [ResultController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Teacher Details (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::post('/teachers', [TeacherController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Class Schedule (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::post('/schedule', [ClassScheduleController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | Admin Notifications (Send, Manage) - No Auth
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

    /*
    |--------------------------------------------------------------------------
    | 🚀 PARENT NOTIFICATIONS (No Auth)
    |--------------------------------------------------------------------------
    */

    Route::prefix('/parent/notifications')
        ->name('parent.notifications.')
        ->group(function () {

            // Get all notifications (paginated)
            Route::get('/', [ParentNotificationController::class, 'index'])
                ->name('index');

            // Get notification details
            Route::get('/{id}', [ParentNotificationController::class, 'show'])
                ->name('show');

            // Get unread notifications
            Route::get('/unread', [ParentNotificationController::class, 'unread'])
                ->name('unread');

            // Get unread count
            Route::get('/unread/count', [ParentNotificationController::class, 'unreadCount'])
                ->name('unread-count');

            // Mark as read
            Route::post('/{id}/read', [ParentNotificationController::class, 'markAsRead'])
                ->name('mark-read');

            // Mark all as read
            Route::post('/read-all', [ParentNotificationController::class, 'markAllAsRead'])
                ->name('mark-all-read');

            // Delete notification
            Route::delete('/{id}', [ParentNotificationController::class, 'destroy'])
                ->name('destroy');

            // Delete all read notifications
            Route::delete('/read/delete', [ParentNotificationController::class, 'deleteRead'])
                ->name('delete-read');

            // Get notification statistics
            Route::get('/stats', [ParentNotificationController::class, 'stats'])
                ->name('stats');
        });
});