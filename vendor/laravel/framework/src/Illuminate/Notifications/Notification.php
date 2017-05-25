<?php

namespace Illuminate\Notifications;

use Illuminate\Queue\SerializesModels;

class Notification
{
    use SerializesModels;

    /**
     * The unique identifier for the notification.
     *
     * @var string
     */
    public $id;

    public $lang;

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

    public function boot()
    {
         $this->lang = getLocaleLang();
    }
}
