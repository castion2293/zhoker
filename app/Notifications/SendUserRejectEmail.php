<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendUserRejectEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $cart;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($cart)
    {
        $this->cart = $cart;

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
                    ->subject($this->lang->desktop()['notification']['userreject_title'])
                    ->line($this->lang->desktop()['notification']['userreject_p1'])
                    ->line($this->lang->desktop()['notification']['userreject_p2'] . $this->cart->meals()->first()->name . $this->lang->desktop()['notification']['userreject_reject'])
                    ->line($this->lang->desktop()['notification']['userreject_p3'])
                    ->line($this->lang->desktop()['notification']['userreject_p4']);
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
