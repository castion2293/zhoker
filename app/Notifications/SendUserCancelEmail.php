<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendUserCancelEmail extends Notification implements ShouldQueue
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
         $this->message = "Meal Name: " . $this->cart->meals()->first()->name . "\r\n" .
                         "Unite Price:" . $this->cart->unite_price . "\r\n" .
                         "People order: " . $this->cart->people_order . "\r\n" .
                         "Total Price: " . $this->cart->price . "\r\n" .
                         "in " . $this->cart->method . " method" . "\r\n" .
                         "on " . $this->cart->datetimepeoples()->first()->date . "\r\n" .
                         "at " . $this->cart->datetimepeoples()->first()->time . "\r\n" .
                         "The chef name is " . $this->cart->cheforders()->first()->chefs()->first()->users()->first()->first_name . "\r\n" .
                         "\r\n";

        return (new MailMessage)
                    ->subject('Zhoker.com User Meal Order Cancellation Notification')
                    ->line('This is the meal meal information:')
                    ->line($this->message)
                    ->line('This meal was cancelled by you and you will get refund back in couple business days')
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
