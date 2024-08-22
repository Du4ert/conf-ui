<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;


class BulkUsersNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public User $user, public $message, public $message_en)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function firstMiddleName() {
        $threatment = $this->user->first_name;
        
        if ($this->user->middle_name) {
            $threatment .= ' ' . $this->user->middle_name;
        }
        
        return $threatment;
    }
    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Notification from conf-genbio.ru')
                    ->line('Уважаемый(ая) ' . $this->firstMiddleName() . ',')
                    ->line($this->message)
                    ->line('---')
                    ->line('Dear ' . $this->user->first_name_en . ',')
                    ->line($this->message_en)
                    ->action('Перейти / Go to site', route('user.get.reports', $this->user->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
