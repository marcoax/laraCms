<?php namespace App\LaraCms\Tools;

/**
 * Created by Luca.
 * Date: 17/11/16
 * Time: 08:12
 */

use Illuminate\Mail\Mailer as Mail;

abstract class Mailer
{
    /**
     * The mailer instance.
     *
     * @var Illuminate\Mail\Mailer
     */
    protected $mail;

    /**
     * Destination address.
     *
     * @var string
     */
    protected $toAddress;

    /**
     * Mailer constructor.
     *
     * @param Mail $mail
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * This method is used to send an email to the specified address.
     *
     * @param array $from: From address and name.
     * @param array $data: The data that needs to be passed to the view.
     * @param null $replyToAddress: The ReplyTo address.
     * @param null $replyToName: The ReplyTo name.
     *
     * @return void
     */
    public function sendMail($from, $data = [], $replyToAddress = null, $replyToName = null)
    {
        $this->mail->send($this->view, $data, function($message) use($from, $replyToAddress, $replyToName)
        {
            $message->from($from['address'], $from['name'])
                ->to($this->toAddress)
                ->subject($this->subject);

            if ($replyToAddress != null)
                $message->replyTo($replyToAddress, $replyToName);
        });
    }

    /**
     * This method is used to queue an email to be sent to the specified address.
     *
     * @param $from: From address.
     * @param array $data: View data.
     * @param null $replyToAddress: The ReplyTo address.
     * @param null $replyToName: The ReplyTo name.
     *
     * @return void
     */
    public function queueMail($from, $data = [], $replyToAddress = null, $replyToName = null)
    {
        // Declaring variables here is mandatory otherwise
        // the queue won't be able to refer to $this
        // context later on.
        $to = $this->toAddress;
        $subject = $this->subject;

        $this->mail->queue($this->view, $data, function($message) use($from, $to, $subject, $replyToAddress, $replyToName)
        {
            $message->from($from['address'], $from['name'])
                ->to($to)
                ->subject($subject);

            if ($replyToAddress != null)
                $message->replyTo($replyToAddress, $replyToName);
        });
    }
}