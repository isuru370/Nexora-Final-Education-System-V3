<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Enums\NotificationStatus;
use App\Services\Firebase\FirebaseNotificationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $backoff = [10, 30, 60];
    public $timeout = 120;
    public $maxExceptions = 3;
    
    protected int $notificationId;

    public function __construct(int $notificationId)
    {
        $this->notificationId = $notificationId;
        $this->onQueue('notifications');
    }

    public function handle(FirebaseNotificationService $firebaseService): void
    {
        $notification = Notification::find($this->notificationId);

        if (!$notification) {
            Log::error('Notification not found', [
                'notification_id' => $this->notificationId,
            ]);
            return;
        }

        // Check if already sent or cancelled
        if ($notification->wasSent() || $notification->isCancelled()) {
            Log::info('Notification already sent or cancelled', [
                'notification_id' => $notification->id,
                'status' => $notification->status,
            ]);
            return;
        }

        // Check if scheduled for later
        if ($notification->isScheduled()) {
            $delay = $notification->scheduled_at->diffInSeconds(now());
            if ($delay > 0) {
                // Re-dispatch with delay
                self::dispatch($notification->id)
                    ->onQueue('notifications')
                    ->delay(now()->addSeconds($delay));
                
                Log::info('Notification re-dispatched for scheduled time', [
                    'notification_id' => $notification->id,
                    'scheduled_at' => $notification->scheduled_at,
                    'delay_seconds' => $delay,
                ]);
                return;
            }
        }

        // Check if student still has active tokens
        $hasTokens = $notification->student->activeFcmTokens()->exists();
        if (!$hasTokens) {
            $notification->markAsFailed('No active FCM tokens at time of sending');
            Log::warning('No active tokens for notification', [
                'notification_id' => $notification->id,
                'student_id' => $notification->student_id,
            ]);
            return;
        }

        Log::info('Processing notification job', [
            'notification_id' => $notification->id,
            'attempt' => $this->attempts(),
            'student_id' => $notification->student_id,
        ]);

        $notification->markAsProcessing();

        try {
            $firebaseService->send($notification);
            
            Log::info('Notification sent successfully', [
                'notification_id' => $notification->id,
                'student_id' => $notification->student_id,
            ]);

        } catch (\Exception $e) {
            $notification->markAsFailed($e->getMessage());
            Log::error('Notification job failed', [
                'notification_id' => $notification->id,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Handle job failure
     */
    public function failed(\Throwable $exception): void
    {
        $notification = Notification::find($this->notificationId);
        
        if ($notification) {
            $notification->update([
                'status' => NotificationStatus::FAILED,
                'error_message' => 'Job failed after ' . $this->attempts() . ' attempts: ' . $exception->getMessage(),
            ]);
        }

        Log::error('SendNotificationJob failed permanently', [
            'notification_id' => $this->notificationId,
            'error' => $exception->getMessage(),
            'attempts' => $this->attempts(),
        ]);
    }
}