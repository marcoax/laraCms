<?php

namespace App\Listeners\Registration;

use App\Events\Registration\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMessage
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
        /*
         *  TODO Add a mail wrapper
         */
        $data['email'] = $event->user->email;
        $data['real_password'] = $event->user->real_password;
        $data['mailSubject']  = trans('website.mail_message.welcome_subject').' '.$event->user->name;

        Mail::send('emails.welcome_notification', $data,function ($message) use ($data) {
            $message->subject( $data['mailSubject'] )
                ->to($data['email'])
                ->replyTo(config('laraCms.website.app.mail.to'));
        });
    }
}
