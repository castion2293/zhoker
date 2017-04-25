<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendChefOrderEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $chef_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($chef_id)
    {
        $this->chef_id = $chef_id;

        parent::boot();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->success()
                    ->subject(self::$lang->desktop()['notification']['cheforder_title'])
                    ->line(self::$lang->desktop()['notification']['cheforder_p1'])
                    ->action(self::$lang->desktop()['notification']['cheforder_action'], url('/order/chef_order/'.$this->chef_id))
                    ->line(self::$lang->desktop()['notification']['cheforder_p2']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
