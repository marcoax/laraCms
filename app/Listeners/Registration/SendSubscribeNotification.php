<?php

namespace App\Listeners\Registration;

use App\Events\Registration\NewsletterSubscribe;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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
        $data['email'] = $event->newsletter->email;
        $data['mailSubject']  = trans('website.mail_message.subscribe_newsletter_subject');

        Mail::send('emails.newsletter_subscribe_notification', $data,function ($message) use ($data) {
            $message->subject( $data['mailSubject'] )
                ->to(config('laraCms.website.app.mail.to'))
                ->replyTo($data['email']);
        });
    }
}
