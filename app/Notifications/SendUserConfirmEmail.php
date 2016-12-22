<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class SendUserConfirmEmail extends Notification implements ShouldQueue
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
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'SMS'];
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
                    ->subject('Zhoker.com Meal Order Confirmation')
                    ->line('Welcome use Zhoker.com')
                    ->line('Your meal order: ' . $this->cart->meals()->first()->name . ' was comfirmed')
                    ->line('and we charge you $' . $this->cart->price . ' successfully!')
                    ->line('please remember attend your meal appointment on time. Thanks again using our Zhoker.com service and enjoy your meal!!');
                    
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

    /**
    * Get the Nexmo / SMS representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return NexmoMessage
    */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                    ->content('Welcome use Zhoker.com. Your meal order: ' . $this->cart->meals()->first()->name . ' was comfirmed. 
                              and we charge you $' . $this->cart->price . ' successfully! please remember attend your meal appointment 
                              on time. Thanks again using our Zhoker.com service and enjoy your meal!!');
    }
}
