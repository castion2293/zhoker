<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendUserOrderEmail extends Notification
{
    use Queueable;

    public $carts;
    public $message = "";

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($carts)
    {
        $this->carts = $carts;
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
        $this->carts->each(function($cart) {

            $this->message = $this->message . "Meal Name: " . $cart->meals()->first()->name . "\r\n" .
                            "Unite Price:" . $cart->unite_price . "\r\n" .
                            "People order: " . $cart->people_order . "\r\n" .
                            "Total Price: " . $cart->price . "\r\n" .
                            "in " . $cart->method . " method" . "\r\n" .
                            "on " . $cart->datetimepeoples()->first()->date . "\r\n" .
                            "at " . $cart->datetimepeoples()->first()->time . "\r\n" .
                            "The chef name is " . $cart->cheforders()->first()->chefs()->first()->users()->first()->first_name . "\r\n" .
                            "\r\n";
        });

        return (new MailMessage)
                    ->subject('Zhoker.com Meal Order Confirmation')
                    ->line('Welcome use Zhoker.com')
                    ->line('This is the meal you order:')
                    ->line($this->message)
                    ->line('Those meals need chefs confirm first. You will not be charged before the chef comfirm the meal.')
                    ->line('You will be informed agian after chef confirm the meal.')
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
