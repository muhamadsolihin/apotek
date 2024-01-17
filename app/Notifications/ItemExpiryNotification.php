<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ItemExpiryNotification extends Notification
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('One of your inventory items is about to expire.')
            ->line('Item: ' . $this->item->nama_obat)
            ->line('Expiry Date: ' . $this->item->expired_date)
            ->action('View Inventory', url('/inventory'))
            ->line('Thank you for using our application!');
    }
}



