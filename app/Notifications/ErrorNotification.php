<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ErrorNotification extends Notification
{
    use Queueable;

    protected $exception;

    public function __construct(\Throwable $exception)
    {
        $this->exception = $exception;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('System Error Detected')
                    ->line('An error occurred in the system.')
                    ->line('Error Message: ' . $this->exception->getMessage())
                    ->line('File: ' . $this->exception->getFile())
                    ->line('Line: ' . $this->exception->getLine())
                    ->line('Please check the system logs for more details.');
    }
}