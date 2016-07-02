<?php

namespace App\Listeners;

use App\Events\NewsletterSubscribe;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubscribeNotification
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
     * @param  NewsletterSubscribe  $event
     * @return void
     */
    public function handle(NewsletterSubscribe $event)
    {
        //
    }
}
