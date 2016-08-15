<?php namespace App\Listeners\Registration;

use App\Events\Registration\UserRegistered;
use App\Newsletter;

class AddUserToDefaultNewsletterList
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        //add user to newsletter default  recipient
        // TODO  check if  emailis  already present /create trait)
        Newsletter::addToDefaultList($event->user->email);
    }
}
