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
                    ->subject($this->lang->desktop()['notification']['userconfirm_title'])
                    ->line($this->lang->desktop()['notification']['userconfirm_p1'])
                    ->line($this->lang->desktop()['notification']['userconfirm_p2'] . $this->cart->meals()->first()->name . $this->lang->desktop()['notification']['userconfirm_confirm'])
                    ->line($this->lang->desktop()['notification']['userconfirm_p3'] . $this->cart->price . $this->lang->desktop()['notification']['userconfirm_success'])
                    ->line($this->lang->desktop()['notification']['userconfirm_p4']);
                    
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
