<?php

namespace App\Listeners;

use jdavidbakr\MailTracker\Events\EmailDeliveredEvent;

class EmailDelivered
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EmailDeliveredEvent $event)
    {
        $event;
    }
}
