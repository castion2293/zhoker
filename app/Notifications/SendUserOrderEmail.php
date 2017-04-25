<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendUserOrderEmail extends Notification implements ShouldQueue
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
        $this->carts->each(function($cart) {

            $this->message = $this->message . self::$lang->desktop()['notification']['meal_name'] . ': ' . $cart->meals()->first()->name . "\r\n" .
                            self::$lang->desktop()['notification']['unite_price'] . ': ' . $cart->unite_price . "\r\n" .
                            self::$lang->desktop()['notification']['people_order'] . ': ' . $cart->people_order . "\r\n" .
                            self::$lang->desktop()['notification']['total_price'] . ': ' . $cart->price . "\r\n" .
                            self::$lang->desktop()['notification']['in'] . ': ' . $cart->method . " method" . "\r\n" .
                            self::$lang->desktop()['notification']['on'] . ': ' . $cart->datetimepeoples()->first()->date . "\r\n" .
                            self::$lang->desktop()['notification']['at'] . ': ' . $cart->datetimepeoples()->first()->time . "\r\n" .
                            self::$lang->desktop()['notification']['chef_name'] . $cart->cheforders()->first()->chefs()->first()->users()->first()->first_name . "\r\n" .
                            "\r\n";
        });

        return (new MailMessage)
                    ->subject(self::$lang->desktop()['notification']['userorder_title'])
                    ->line(self::$lang->desktop()['notification']['userorder_p1'])
                    ->line(self::$lang->desktop()['notification']['userorder_p2'])
                    ->line($this->message)
                    ->line(self::$lang->desktop()['notification']['userorder_p3'])
                    ->line(self::$lang->desktop()['notification']['userorder_p4'])
                    ->line(self::$lang->desktop()['notification']['userorder_p5']);
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
