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
                    ->subject('Zhoker.com Chef Order Confirmation')
                    ->line('You have couple meals need to approve. please click the link below and approve that.')
                    ->action('Approval', url('/order/chef_order/'.$this->chef_id))
                    ->line('Thanks choose Zhoker.com and please feel free to ask if you have any question.');
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
