<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderApprovalNotification extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */

     public function __construct($order)
     {
        $this->order = $order;
     }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Ordernummer:' . ' '  . $this->order->id . ' ' . 'wacht op goedkeuring',
            'order_id' => $this->order->id,
        ];
    }
}
