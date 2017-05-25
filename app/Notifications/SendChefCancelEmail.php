<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendChefCancelEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $cart;
    public $message = "";

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
        $this->message = $this->lang->desktop()['notification']['meal_name'] . ": " . $this->cart->meals()->first()->name . "\r\n" .
                         $this->lang->desktop()['notification']['unite_price'] . ": " . $this->cart->unite_price . "\r\n" .
                         $this->lang->desktop()['notification']['people_order'] . ": " . $this->cart->people_order . "\r\n" .
                         $this->lang->desktop()['notification']['total_price'] . ": " . $this->cart->price . "\r\n" .
                         $this->lang->desktop()['notification']['in'] . $this->cart->method . " method" . "\r\n" .
                         $this->lang->desktop()['notification']['on'] . $this->cart->datetimepeoples()->first()->date . "\r\n" .
                         $this->lang->desktop()['notification']['at'] . $this->cart->datetimepeoples()->first()->time . "\r\n" .
                         $this->lang->desktop()['notification']['chef_name'] . $this->cart->cheforders()->first()->chefs()->first()->users()->first()->first_name . "\r\n" .
                         "\r\n";

        return (new MailMessage)
                    ->subject($this->lang->desktop()['notification']['chefcancel_title'])
                    ->line($this->lang->desktop()['notification']['chefcancel_p1'])
                    ->line($this->message)
                    ->line($this->lang->desktop()['notification']['chefcancel_p2'])
                    ->line($this->lang->desktop()['notification']['chefcancel_p3']);
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
