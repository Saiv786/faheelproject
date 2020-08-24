<?php

namespace App\Listeners;

use jdavidbakr\MailTracker\Events\EmailSentEvent;

class EmailSent
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
    public function handle(EmailSentEvent $event)
    {
        \Log::debug('send');
        $x=$event->sent_email->getHeader('X-Model-ID');
        \Log::debug($x);
    }
}
