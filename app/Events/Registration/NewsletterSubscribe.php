<?php

namespace App\Events\Registration;

use App\Events\Event;
use App\Newsletter;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewsletterSubscribe extends Event
{
    use SerializesModels;
    public $newsletter;

    /**
     * NewsletterSubscribe constructor.
     * @param Newsletter $newsletter
     */
    public function __construct(Newsletter $newsletter)
    {
        //
        $this->newsletter = $newsletter;
    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
